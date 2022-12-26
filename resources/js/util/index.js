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
 * ハンバーガーメニューの表示を切り替える
 */
export function hamburgerToggle() {
  const hamburger = document.querySelector('.hamburger');
  const globalMenuSp = document.querySelector('.globalMenuSp');
  const navList = document.getElementById('nav-list');

  hamburger.addEventListener('click', function () {
    this.classList.toggle('active');

    if (this.classList.contains('active')) {
      globalMenuSp.classList.add('active');
      navList.style.pointerEvents = 'auto';
    } else {
      globalMenuSp.classList.remove('active');
      navList.style.pointerEvents = 'none';
    }
  });
}
