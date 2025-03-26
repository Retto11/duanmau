<div class="row mb footer">
    Dự án mẫu
</div>
</div>
<script>
    var i = 0;
    var imgarr = ["view/images/laptop2.jpg", "view/images/phone3.jpg", "view/images/ipad1.png", "view/images/tainghe2.jpg", "view/images/PC.jpg", "view/images/tivi3.jpg", "view/images/dongho1.jpg", "view/images/mayanh.jpg", "view/images/banphim1.jpg"];
    var slideshow = document.getElementById("slideshow");

    function next() {
        i++;
        if(i == imgarr.length) {
            i = 0;
        }
        changeImage();
    }

    function prev() {
        i--;
        if(i < 0) {
            i = imgarr.length - 1;
        }
        changeImage();
    }

    function changeImage() {
        slideshow.classList.add("flash");
        setTimeout(function() {
            slideshow.src = imgarr[i];
            slideshow.classList.remove("flash");
        }, 500); // Thời gian trùng khớp với transition
    }

    setInterval(next, 2000);
</script>
</body>
</html>