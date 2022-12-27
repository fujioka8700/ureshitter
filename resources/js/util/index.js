/**
 * クッキーの値を取得する
 * @param {String} searchKey 検索するキー
 * @returns {String} キーに対応する値
 */
export function getCookieValue(searchKey) {
  if (typeof searchKey === 'undefined') {
    return '';
  }

  let val = '';

  document.cookie.split(';').forEach((cookie) => {
    const [key, value] = cookie.split('=');
    if (key === searchKey) {
      return (val = value);
    }
  });

  return val;
}

/**
 * ハンバーガーアイコンをタッチすると、メニューを表示する
 * @param {HTMLElement} hamburger ハンバーガーアイコンの要素
 * @param {HTMLElement} globalMenuSp メニューの要素
 */
const menuDisplay = (hamburger, globalMenuSp) => {
  hamburger.addEventListener('click', function () {
    this.classList.toggle('active');

    if (this.classList.contains('active')) {
      globalMenuSp.classList.add('active');
    } else {
      globalMenuSp.classList.remove('active');
    }
  });
};

/**
 * メニュー項目のどれかタッチすると、メニューを閉じる
 * @param {HTMLElement} hamburger ハンバーガーアイコンの要素
 * @param {HTMLElement} globalMenuSp メニューの要素
 */
const closeMenu = (hamburger, globalMenuSp) => {
  const ulElement = globalMenuSp.firstElementChild;
  const liElements = ulElement.children;

  Array.prototype.forEach.call(liElements, function (item) {
    item.addEventListener('click', function () {
      hamburger.classList.toggle('active');

      if (hamburger.classList.contains('active')) {
        globalMenuSp.classList.add('active');
      } else {
        globalMenuSp.classList.remove('active');
      }
    });
  });
};

/**
 * 画面全体どこをタッチしても、メニューを閉じる
 * @param {HTMLElement} hamburger ハンバーガーアイコンの要素
 * @param {HTMLElement} globalMenuSp メニューの要素
 */
const closeMenuByTouch = (hamburger, globalMenuSp) => {
  const appMainElement = document.querySelector('.app-main');

  appMainElement.addEventListener('click', function () {
    const hamburgerOpen = hamburger.classList.contains('active');
    const menuOpen = globalMenuSp.classList.contains('active');

    if (hamburgerOpen && menuOpen) {
      hamburger.classList.remove('active');
      globalMenuSp.classList.remove('active');
    }
  });
};

/**
 * ハンバーガーメニュー。
 * @return {boolean} ハンバーガーメニューが、設置出来たらfalseを返す
 */
export function hamburger() {
  const hamburger = document.querySelector('.hamburger');
  const globalMenuSp = document.querySelector('.globalMenuSp');

  menuDisplay(hamburger, globalMenuSp);

  closeMenu(hamburger, globalMenuSp);

  closeMenuByTouch(hamburger, globalMenuSp);

  return false;
}
