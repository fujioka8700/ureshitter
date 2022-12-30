/**
 * クッキーの値を取得します。
 * @param {String} searchKey 検索するキーです。
 * @returns {String} キーに対応する値です。
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
 * ハンバーガーアイコンをタッチすると、メニューを表示します。
 * @param {HTMLElement} hamburger ハンバーガーアイコンの要素です。
 * @param {HTMLElement} globalMenuSp メニューの要素です。
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
 * メニュー項目のどれかタッチすると、メニューを閉じます。
 * @param {HTMLElement} hamburger ハンバーガーアイコンの要素です。
 * @param {HTMLElement} globalMenuSp メニューの要素です。
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
 * 画面全体どこをタッチしても、メニューを閉じます。
 * @param {HTMLElement} hamburger ハンバーガーアイコンの要素です。
 * @param {HTMLElement} globalMenuSp メニューの要素です。
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
 * ハンバーガーメニューを作成します。
 */
export function hamburger() {
  const hamburger = document.querySelector('.hamburger');
  const globalMenuSp = document.querySelector('.globalMenuSp');

  menuDisplay(hamburger, globalMenuSp);

  closeMenu(hamburger, globalMenuSp);

  closeMenuByTouch(hamburger, globalMenuSp);
}
