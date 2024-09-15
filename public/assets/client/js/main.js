var hoverNav = document.querySelector('.hover-nav-oto');
var navOto = document.querySelector('.nav-oto');
var html = document.querySelector('html');
// hoverNav.addEventListener('clickenter', function () {
//   navOto.classList.remove('d-none');
//   navOto.style.animation = 'fadeIn 0.2s ease-in';
// });
// hoverNav.addEventListener('clickleave', function () {
//   navOto.style.animation = 'fadeOut 0.2s ease-in';
//   setTimeout(function () {
//     navOto.classList.add('d-none');
//   }, 190)
// });
hoverNav.addEventListener('click', function (event) {
  event.stopPropagation(); // Prevents the click from propagating to the html element
  if (navOto.classList.contains('d-none')) {
    navOto.classList.remove('d-none');
    navOto.style.animation = 'fadeIn 0.2s ease-in';
  }
});

html.addEventListener('click', function (event) {
  if (!hoverNav.contains(event.target) && !navOto.contains(event.target)) {
    navOto.style.animation = 'fadeOut 0.2s ease-in';
    setTimeout(function () {
      navOto.classList.add('d-none');
    }, 180);
  }
});

var slider = document.querySelector('.slider')
var coverSlide = document.querySelector('.cover__slide')
var slideImg = document.querySelectorAll('.slide__img')
var itemDots = document.querySelectorAll('.item__dot')
var leftSlide = document.querySelector('.fa-chevron-left')
var rightSlide = document.querySelector('.fa-chevron-right')
var countSlide = 0;
var posSlide = 0
var positionX = 100;
var indexSlide = 0;
// [...itemDots].forEach((item) =>
//     item.addEventListener("click", function (e) {
//         [...itemDots].forEach(function (el) {
//             el.classList.remove('active')
//         })
//         e.target.classList.add('active')
//         var moveSlide = parseInt(e.target.dataset.index);
//         indexSlide = moveSlide;
//         posSlide = -1 * indexSlide * positionX
//         Object.assign(coverSlide.style, {
//             transform: `translateX(${posSlide}%)`,
//         })
//     }))
[...itemDots].forEach(function (item) {
  item.addEventListener('click', function (e) {
    [...itemDots].forEach(function (el) {
      el.classList.remove('active')
    })
    e.target.classList.add('active')
    var moveSlide = parseInt(e.target.dataset.index); // chuyển từ string thành int.
    indexSlide = moveSlide;
    posSlide = -1 * indexSlide * positionX;
    Object.assign(coverSlide.style, {
      transform: `translateX(${posSlide}%)`,
    })
  });
});

// // click next pre Slider
if (rightSlide != null && leftSlide != null) {
  rightSlide.addEventListener('click', function () {
    if (indexSlide >= slideImg.length - 1) {
      indexSlide = slideImg.length - 1;
      return;
    }
    posSlide = posSlide - positionX;
    Object.assign(coverSlide.style, {
      transform: `translateX(${posSlide}%)`,
    });
    indexSlide++;
    [...itemDots].forEach(function (el) {
      el.classList.remove('active');
    });
    itemDots[indexSlide].classList.add('active');
  });

  leftSlide.addEventListener('click', function () {
    if (indexSlide <= 0) {
      indexSlide = 0;
      return;
    }
    posSlide = posSlide + positionX;
    Object.assign(coverSlide.style, {
      transform: `translateX(${posSlide}%)`,
    });
    indexSlide--;
    [...itemDots].forEach(function (el) {
      el.classList.remove('active');
    });
    itemDots[indexSlide].classList.add('active');
  });

}


var btnMinus = document.querySelector('.minus')
var btnPlus = document.querySelector('.plus')
var inputQuantity = document.querySelector('#product-quantity')
var detailPrice = document.querySelector('.details-price');
if(detailPrice!=null){
  detailInner = detailPrice.innerText;
detailArr = detailInner.split(".");
strValue = "";
detailArr.forEach(function (e) {
  strValue += e;
})
floatValue = parseFloat(strValue);

var numberFormat = new Intl.NumberFormat('vi-VN', {
  style: 'currency',
  currency: 'VND',
});

btnMinus.addEventListener('click', function () {
  var value = parseInt(inputQuantity.value);
  if (value > 1) {
    inputQuantity.value = value - 1;
    quantityValue = inputQuantity.value;
    // console.log(quantityValue * floatValue)
    detailPrice.innerHTML = (quantityValue * floatValue).toLocaleString('de-DE') + " VNĐ";
  }

})

btnPlus.addEventListener('click', function () {
  var value = parseInt(inputQuantity.value);
  inputQuantity.value = value + 1;
  quantityValue = inputQuantity.value;
  // console.log(quantityValue * floatValue)
  detailPrice.innerHTML = (quantityValue * floatValue).toLocaleString('de-DE') + " VNĐ";

})
}

