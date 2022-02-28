let menutoggle = document.querySelector('.toggle');
                let menu = document.querySelector('.menu');
                menutoggle.onclick = function () {
                    menu.classList.toggle('open');
                    menutoggle.classList.toggle('active');
                };