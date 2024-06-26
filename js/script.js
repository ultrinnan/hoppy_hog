/*jshint esversion: 6 */

jQuery(document).ready(function($) {

    function correctHeight(){
        // First we get the viewport height and we multiple it by 1% to get a value for a vh unit
        let vh = window.innerHeight * 0.01;
// Then we set the value in the --vh custom property to the root of the document
        document.documentElement.style.setProperty('--vh', `${vh}px`);
    }

    window.addEventListener("resize", function() {
        // Get screen size (inner/outerWidth, inner/outerHeight)
        correctHeight();
    }, false);

    let hog = document.getElementById('hog');
// if (window.DeviceOrientationEvent) {
    window.addEventListener('deviceorientation', rotateBeer);
// }
    function rotateBeer(evt) {
        let angle = (-evt.gamma/2<-45)?-45:(-evt.gamma/2>45)?45:-evt.gamma/2;
        hog.style.setProperty('--angle', angle +'deg');
    }

// --------------

// бегущие цифры по скролу -------
    let scroller = true;
    $(window).scroll(function () {
        if (scroller===true) {
            if( $(window).scrollTop() > 300 ) {
                let years_stop = $(".ben_years").html() *1;
                $({ n: 1 }).animate({ n: years_stop }, {
                    duration: 3000,
                    step: function (a) {
                        $(".ben_years").html(a | 0);
                    }
                });
                let ben_time = $(".ben_time").html() *1;
                $({ n: 1 }).animate({ n: ben_time }, {
                    duration: 3000,
                    step: function (a) {
                        $(".ben_time").html(a | 0);
                    }
                });
                let ben_parts = $(".ben_parts").html() *1;
                $({ n: 1 }).animate({ n: ben_parts }, {
                    duration: 3000,
                    step: function (a) {
                        $(".ben_parts").html(a | 0);
                    }
                });
                scroller = false;
            }
        }
    });
// бегущие цифры по скролу end ------------

// -------------

//  dot nav
    let dotNav = (elem, easing) => {
        function scrollIt(destination, duration = 200, easing = 'linear') {
            const easings = {
                linear(t) { return t; },
                easeInQuad(t) { return t * t; },
                easeOutQuad(t) { return t * (2 - t); },
                easeInOutQuad(t) { return t < 0.5 ? 2 * t * t : -1 + (4 - 2 * t) * t; },
                easeInCubic(t) { return t * t * t; },
                easeOutCubic(t) { return (--t) * t * t + 1; },
                easeInOutCubic(t) { return t < 0.5 ? 4 * t * t * t : (t - 1) * (2 * t - 2) * (2 * t - 2) + 1; },
                easeInQuart(t) { return t * t * t * t; },
                easeOutQuart(t) { return 1 - (--t) * t * t * t; },
                easeInOutQuart(t) { return t < 0.5 ? 8 * t * t * t * t : 1 - 8 * (--t) * t * t * t; },
                easeInQuint(t) { return t * t * t * t * t; },
                easeOutQuint(t) { return 1 + (--t) * t * t * t * t; },
                easeInOutQuint(t) { return t < 0.5 ? 16 * t * t * t * t * t : 1 + 16 * (--t) * t * t * t * t; }
            };
            const start = window.pageYOffset;
            const startTime = 'now' in window.performance ? performance.now() : new Date().getTime();
            const documentHeight = Math.max(document.body.scrollHeight, document.body.offsetHeight, document.documentElement.clientHeight, document.documentElement.scrollHeight, document.documentElement.offsetHeight);
            const windowHeight = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;
            const destinationOffset = typeof destination === 'number' ? destination : destination.offsetTop;
            const destinationOffsetToScroll = Math.round(documentHeight - destinationOffset < windowHeight ? documentHeight - windowHeight : destinationOffset);
            if ('requestAnimationFrame' in window === false) {
                window.scroll(0, destinationOffsetToScroll);
                // if (callback) {
                //     callback();
                // }
                return;
            }
            function scroll() {
                const now = 'now' in window.performance ? performance.now() : new Date().getTime();
                const time = Math.min(1, ((now - startTime) / duration));
                const timeFunction = easings[easing](time);
                window.scroll(0, Math.ceil((timeFunction * (destinationOffsetToScroll - start)) + start));
                if (window.pageYOffset === destinationOffsetToScroll) {
                    // if (callback) {
                    //     callback();
                    // }
                    return;
                }
                requestAnimationFrame(scroll);
            }
            scroll();
        }

        //  in viewport

        const inViewport = (el) => {
            let allElements = document.getElementsByTagName(el);
            let windowHeight = window.innerHeight;
            const elems = () => {
                for (let i = 0; i < allElements.length; i++) {  //  loop through the sections
                    let viewportOffset = allElements[i].getBoundingClientRect();  //  returns the size of an element and its position relative to the viewport
                    let top = viewportOffset.top;  //  get the offset top
                    if(top < windowHeight){  //  if the top offset is less than the window height
                        allElements[i].classList.add('in-viewport');  //  add the class
                    } else{
                        allElements[i].classList.remove('in-viewport');  //  remove the class
                    }
                }
            };
            elems();
            window.addEventListener('scroll', elems);
        };
        inViewport('section');

        //  dot nav

        const allSecs = document.getElementsByTagName(elem);
        const nav = document.getElementById('dot-nav');
        const scrollSpeed = '1000';
        let allVis = document.getElementsByClassName('in-viewport'),
            allDots;
        for (let i = 0; i < allSecs.length; i++) {
            allSecs[i].classList.add('section-' + i);
        }

        //  add the dots

        const buildNav = () => {
            for (let i = 0; i < allSecs.length; i++) {
                const dotCreate = document.createElement('a');
                dotCreate.id = 'dot-' + i;
                dotCreate.classList.add('dots');
                dotCreate.href = '#';
                dotCreate.setAttribute('data-sec', i);
                nav.appendChild(dotCreate);
            }
        };
        buildNav();

        //  nav position

        let navHeight = document.getElementById('dot-nav').clientHeight;
        let hNavHeight = navHeight / 2;
        // document.getElementById('dot-nav').style.top = 'calc(50% - ' + hNavHeight + 'px)';

        //  onscroll

        const dotActive = () => {
            allVis = document.getElementsByClassName('in-viewport');
            allDots = document.getElementsByClassName('dots');
            let visNum = allVis.length;
            let a = visNum - 1;
            for (let i = 0; i < allSecs.length; i++) {
                allDots[i].classList.remove('active');
            }
            document.getElementById('dot-' + a).classList.add('active');
        };
        dotActive();
        window.onscroll = function(){ dotActive(); };

        //  click stuff

        const scrollMe = (e) => {
            let anchor = e.currentTarget.dataset.sec;
            scrollIt(document.querySelector('.section-' + anchor), scrollSpeed, easing);
            e.preventDefault();
        };

        allDots = document.getElementsByClassName('dots');
        for (let i = 0; i < allDots.length; i++) {
            allDots[i].addEventListener('click', scrollMe);
        }

    };

    dotNav('section', 'easeInOutCubic');

    $('.articles-screen .wrapper').slick({
        // centerMode: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        dots: true,
        dotsClass: 'slick-dots',
        arrows: true,
        infinite: true,
        speed: 1000,
    });
});
