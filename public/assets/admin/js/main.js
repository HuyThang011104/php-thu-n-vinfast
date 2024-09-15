var rangeInput = document.getElementById('customRange1');
    var rangeInput2 = document.getElementById('customRange2');
    var rangeValue = document.getElementById('value-range');
    var rangeValue2 = document.getElementById('value-range2');
    var hiddenInput = document.getElementById('hiddenInput');
    var hiddenInput2 = document.getElementById('hiddenInput2');

    // function rangeMoney(rangeInput, rangeValue, hiddenInput, text = "") {
    //     rangeInput.addEventListener('input', function() {
    //         textContent = this.value;
    //         textContent = textContent * 20000000 * 0.01;
    //         formatNumber = textContent.toLocaleString('vi-VN');
    //         rangeValue.innerHTML = text + formatNumber + 'đ';
    //         // this.value = textContent;
    //         hiddenInput.value = textContent;
    //     })
    // }
    // rangeMoney(rangeInput, rangeValue, hiddenInput, "Giá: ");
    // rangeMoney(rangeInput2, rangeValue2, hiddenInput2, "");

    var hoverEye = document.querySelectorAll('.hover_eye');
    var valueDesc = document.querySelectorAll('.value_description');
    var displayDesc = document.querySelectorAll('.display_desc');

    hoverEye.forEach((item, index) => {
            item.addEventListener('mouseenter', function() {
                var description = valueDesc[index].value;  // lấy giá trị trong ô value input ẩn
                displayDesc[index].classList.remove("d-none"); 
                displayDesc[index].innerHTML = "Mô tả: " + description;
            });

            item.addEventListener('mouseleave', function() {
                var display = displayDesc[index];
                display.classList.add('d-none'); 
            });
        });