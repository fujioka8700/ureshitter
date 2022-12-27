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
          <div class="u-hamburger-menu">
            <div class="d-block d-sm-none">
              <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
              </div>

              <nav class="globalMenuSp">
                <ul>
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
    </div>
  </header>
</template>
