(function ($) {
    $(document).ready(function () {
        const ajax = fvajax.ajaxurl;
        const nonce = fvajax.nonce;
        const burgerOpen = $('.header_burger_icon');
        const burgerClose = $('.header_close_icon');
        const header = $('#header');
        const searchForm = $('#search_form');
        const isDesktop = $(window).width() > 1024;

        if (header.length) {
            if ($(document).scrollTop() > 30) {
                header.addClass('_scrolled');
            }
        }

        if ($(window).width() < 1250) {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 30) {
                    header.addClass('_scrolled');
                } else {
                    header.removeClass('_scrolled');
                }
            });
        }

        if (header.length && burgerOpen.length && burgerClose.length) {
            $(document).on('click', '.header_burger_icon, .header_close_icon', function () {
                $(header).toggleClass('active-menu');
                $('html').toggleClass('no-scroll');
            });
        }

        const articlesLoadBtn = $('#articles_load');
        if (articlesLoadBtn.length) {
            articlesLoadBtn.on('click', function (e) {
                let pageNumber = $(this).attr('data-page');
                pageNumber = parseInt(pageNumber) + 1;

                ajaxPosts(pageNumber);
            });
        }

        function ajaxPosts(pageNumber = 1)
        {
            let formData = new FormData();

            const posts = $('.articles');
            const wrap = $(posts).closest('.container');
            const loadMoreBtn = $('#articles_load');

            formData.append('action', 'load_posts');
            formData.append('nonce', nonce);
            formData.append('search', search);
            formData.append('page', pageNumber);

            jQuery.ajax({
                type       : 'POST',
                url        : ajax,
                data       : formData,
                dataType   : 'json',
                processData: false,
                contentType: false,
                beforeSend : function () {
                    $(wrap).addClass('_spinner');
                },
                success    : function (response) {
                    if (response.posts) {
                        if (response.append) {
                            $(posts).append(response.posts);
                        } else {
                            $(posts).html(response.posts);
                        }

                        if (response.count === 0 || response.end_posts) {
                            $(loadMoreBtn).hide();
                        } else {
                            $(loadMoreBtn).show();
                        }

                        $(loadMoreBtn).attr('data-page', pageNumber);
                    }

                    $(wrap).removeClass('_spinner');
                },
                error      : function (err) {
                    console.log('error', err);
                }
            });
        }

        const pushNotifications = $('.close_btn');
        if (pushNotifications.length) {
            $(document).on('click', '.close_btn', function () {
                const wrap = $(this).closest('.push_notification');
                const id = $(wrap).attr('id');

                if (!localStorage.getItem(id)) {
                    localStorage.setItem(id, '1');
                }

                if (wrap.length) {
                    $(wrap).removeClass('show_up');
                }
            });
        }

        const notifications = [
            'notification-square',
            'notification-wide'
        ];

        $(notifications).each(function (index, item) {
            if (localStorage.getItem(item)) {
                return;
            }

            const notification = $('#' + item);
            if (notification.length) {
                const delay = $(notification).data('delay');

                if (delay) {
                    setTimeout(function () {
                        $(notification).addClass('show_up');
                    }, delay);
                } else {
                    $(notification).addClass('show_up');
                }
            }
        });


        const uploadImgBtn = $('.upload_img__btn');
        const inputUploadFile = $('.file_upload');
        if (uploadImgBtn.length && inputUploadFile.length) {
            $(document).on('click', '.upload_img__btn', function () {
                $(inputUploadFile).trigger('click');
            });

            $(document).on('change', '.file_upload', function () {
                if (!$(this).val()) {
                    return;
                }

                const wrap = $(this).closest('.upload_img');
                const btn = $(wrap).find('.upload_img__btn');
                const url = $(btn).data('url');

                if (!url) {
                    return false;
                }

                const progress = $(wrap).find('.upload_img__progress');

                if (!progress) {
                    return false;
                }

                $(wrap).addClass('active');
                $(progress).show();
                $(btn).hide();

                const progressTrack = $(progress).find('.progress__track');
                const progressVal = $(progress).find('.progress__val span');

                if (!progressTrack || !progressVal) {
                    return false;
                }

                const intervals = [
                    10,
                    25,
                    65,
                    90,
                    100
                ];

                let time = 1500;

                $(intervals).each(function (index, value) {
                    setTimeout(function () {
                        $(progressTrack).css('width', value+'%');
                        $(progressVal).text(value);
                    }, time);
                    time += 1500;
                });

                setTimeout(function () {
                    openLink(url, '_blank');
                    // window.open(url, '_blank');
                }, 1500 * intervals.length );
            });
        }

        function openLink(url, target)
        {
            if (!url) {
                return;
            }

            const form = document.createElement("form");
            form.method = 'GET';
            form.action = url;
            form.target = target ? target : '_self';
            document.body.appendChild(form);
            form.submit();
        }

    });
})(jQuery);