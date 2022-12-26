<script setup>
import logo from '../../../images/logo.svg';
</script>

<template>
  <header class="l-header shadow-sm bg-white position-fixed top-0 start-0 w-100">
    <div class="container">
      <div class="d-flex flex-row justify-content-between align-items-center">
        <div class="wrapper pt-3 pb-3">
          <router-link
            :to="{ name: 'home' }"
            class="d-flex align-items-center text-decoration-none logo-wrap"
          >
            <img :src="logo" alt="Ureshitterのロゴ" />
            <h1 class="header-logo ms-1 text-black">Ureshitter</h1>
          </router-link>
        </div>
        <div>
          <div class="d-none d-sm-block">
            <ul class="nav">
              <li class="nav-item">
                <router-link :to="{ name: 'about' }" class="nav-link nav-link__color">
                  Ureshitterとは
                </router-link>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link nav-link__color"
                  href="https://twitter.com/fujioka8700"
                  target="_blank"
                >
                  twitter
                </a>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link nav-link__color"
                  href="https://github.com/fujioka8700/ureshitter"
                  target="_blank"
                >
                  GitHub
                </a>
              </li>
            </ul>
          </div>
          <div class="d-block d-sm-none">
            <div class="hamburger">
              <span></span>
              <span></span>
              <span></span>
            </div>

            <nav class="globalMenuSp">
              <ul id="nav-list" class="nav-list">
                <li><a href="#">Menu1</a></li>
                <li><a href="#">Menu2</a></li>
                <li><a href="#">Menu3</a></li>
                <li><a href="#">Menu4</a></li>
                <li><a href="#">Menu5</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<style lang="scss">
/*　ハンバーガーボタン */
.hamburger {
  display: block;
  position: fixed;
  z-index: 3;
  right: 32px;
  top: 11px;
  width: 42px;
  height: 42px;
  cursor: pointer;
  text-align: center;
}
.hamburger span {
  display: block;
  position: absolute;
  width: 30px;
  height: 2px;
  left: 6px;
  background: #555;
  -webkit-transition: 0.5s all;
  -moz-transition: 0.5s all;
  transition: 0.5s all;
}
.hamburger span:nth-child(1) {
  top: 10px;
}
.hamburger span:nth-child(2) {
  top: 20px;
}
.hamburger span:nth-child(3) {
  top: 30px;
}

/* ナビ開いてる時のボタン */

.hamburger.active span:nth-child(1) {
  top: 16px;
  left: 6px;
  width: 24px;
  background: #fff;
  -webkit-transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  transform: rotate(-45deg);
}
.hamburger.active span:nth-child(2) {
  left: 60%;
  opacity: 0;
  -webkit-animation: active-btn17-bar02 0.8s forwards;
  animation: active-hamburger-bar02 0.8s forwards;
}
@-webkit-keyframes active-hamburger-bar02 {
  100% {
    height: 0;
  }
}
@keyframes active-hamburger-bar02 {
  100% {
    height: 0;
  }
}
.hamburger.active span:nth-child(3) {
  top: 16px;
  width: 24px;
  background: #fff;
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  transform: rotate(45deg);
}

.hamburger::after {
  position: absolute;
  top: 50%;
  left: 50%;
  display: block;
  content: '';
  width: 52px;
  height: 52px;
  margin: -32px 0 0 -32px;
  border-radius: 50%;
  border: 2px solid rgba(0, 0, 0, 0);
  transition: all 0.75s;
  display: none;
}
.hamburger.active::after {
  border: 2px solid #fff;
}

nav.globalMenuSp {
  position: fixed;
  z-index: 2;
  top: 0;
  left: 0;
  color: #fff;
  background: rgba(0, 0, 0, 0.7);
  text-align: center;
  width: 100%;
  opacity: 0;
  transition: opacity 0.6s ease, visibility 0.6s ease;
}

nav.globalMenuSp ul {
  margin: 0 auto;
  padding: 0;
  width: 100%;
}

nav.globalMenuSp ul li {
  list-style-type: none;
  padding: 0;
  width: 100%;
  transition: 0.4s all;
}
nav.globalMenuSp ul li:last-child {
  padding-bottom: 0;
}
nav.globalMenuSp ul li:hover {
  background: #ddd;
}

nav.globalMenuSp ul li a {
  display: block;
  color: #fff;
  padding: 1em 0;
  text-decoration: none;
}

/* このクラスを、jQueryで付与・削除する */
nav.globalMenuSp.active {
  opacity: 100;
}

.nav-list {
  pointer-events: none;
}
</style>
