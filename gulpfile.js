var autoprefixer = require("gulp-autoprefixer");
var concat = require("gulp-concat");
var gcmq = require("gulp-group-css-media-queries");
var gulp = require("gulp");
var { src, dest, watch } = require("gulp");
var notify = require("gulp-notify");
var plumber = require("gulp-plumber");
var rename = require("gulp-rename");
const sass = require("gulp-sass")(require("sass"));
var sassGlob = require("gulp-sass-glob");
var sourcemaps = require("gulp-sourcemaps");
var uglify = require("gulp-uglify");
var fs = require("fs");
var del = require("del");
var changed = require("gulp-changed");
var imagemin = require("gulp-imagemin");
var imageminJpg = require("imagemin-jpeg-recompress");
var imageminPng = require("imagemin-pngquant");
var imageminGif = require("imagemin-gifsicle");
var svgmin = require("gulp-svgmin");

var public = "./public";
var theme = "./yasushionari";
var themeJs = "./yasushionari/js";
var jsPublic = `${public}/js`;
var ejsSrc = "./src/**/*.ejs";
var sassSrc = "./src/**/*.scss";
var jsSrc = "./src/js/*.js";
var copySrc = [
  // './src/**/*+(.png|.jpeg|.jpg|.gif|.svg|.ico|.mp4|.pdf)',
  "./src/**/*.woff",
];

// srcフォルダを唯一更新する場所とする
gulp.task("clean", function () {
  return del(public, {
    force: false,
  });
});

// sass
gulp.task("styles", function () {
  return (
    gulp
      .src(sassSrc)
      .pipe(
        plumber({
          errorHandler: notify.onError("<%= error.message %>"),
        })
      )
      .pipe(sassGlob())
      // .pipe(sourcemaps.init())
      .pipe(
        sass({
          outputStyle: "compressed",
        })
      )
      .pipe(
        autoprefixer({
          browsers: ["last 2 version", "iOS >= 8.0", "Android >= 5.0"],
          cascade: false,
        })
      )
      .pipe(gcmq())
      // .pipe(sourcemaps.write('./maps'))
      .pipe(gulp.dest(theme))
  );
});

// パスを変数にした
gulp.task("scripts", function () {
  return gulp
    .src(jsSrc)
    .pipe(concat("script.js"))
    .pipe(
      rename({
        suffix: ".min",
      })
    )
    .pipe(
      uglify({
        output: {
          comments: /^!/,
        },
      })
    )
    .pipe(gulp.dest(themeJs));
});

// srcフォルダでファイル管理をするために、.html, .css, .php, 画像をコピーする
// 適宜コピーしたいファイルの拡張子を変数copySrcに追加する
gulp.task("copy", function () {
  return gulp.src(copySrc).pipe(gulp.dest(theme));
});

// jpg,png,gif画像の圧縮タスク
gulp.task("imgMin", function () {
  var srcGlob = "./src/images/**/*+(.png|.jpeg|.jpg|.gif)";
  var dstGlob = "./RBConsulting/images/";
  return src(srcGlob)
    .pipe(plumber())
    .pipe(changed(dstGlob))
    .pipe(
      imagemin([
        imageminPng(),
        imageminJpg(),
        imageminGif({
          interlaced: false,
          optimizationLevel: 3,
          colors: 180,
        }),
      ])
    )
    .pipe(dest(dstGlob));
});

// svg画像の圧縮タスク
gulp.task("svgMin", function () {
  var srcGlob = "./src/images/**/*+(svg)";
  var dstGlob = "./RBConsulting/images/";
  return src(srcGlob).pipe(changed(dstGlob)).pipe(svgmin()).pipe(dest(dstGlob));
});

gulp.task("watch", function () {
  gulp.watch(ejsSrc, gulp.task("ejs"));
  gulp.watch(sassSrc, gulp.task("styles"));
  gulp.watch(jsSrc, gulp.task("scripts"));
  gulp.watch(copySrc, gulp.task("copy"));
});

gulp.task("default", gulp.parallel("watch"));
gulp.task("build", gulp.parallel(["copy", "imgMin", "svgMin"]));
