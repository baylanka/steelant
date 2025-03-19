<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer="defer"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" defer="defer"></script>
<script src="<?= assets("js/app.min.js") ?>?v=<?=  date("h:i:sa") ?>" defer="defer"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const baseModal = "baseModal";
        $(function () {
            $('[data-toggle="tooltip"]').tooltip({
                placement: 'bottom',
            })
        });

        $(document).on('click', '.lang', function(e){
            e.preventDefault();
            debugger
            const selectedLanguage = $(this).attr('data-lang');
            const queryStringObject = getQueryStringParams();
            queryStringObject['lang'] = selectedLanguage;
            window.location.href  = window.location.origin + window.location.pathname + '?' + $.param(queryStringObject);
        });

        function getQueryStringParams() {
            const sPageURL = window.location.search.substring(1);
            if(isEmpty(sPageURL)){
                return {};
            }
            const sURLVariables = sPageURL.split('&');
            const queryParams = {};
            for (let i = 0; i < sURLVariables.length; i++) {
                const sParameterName = sURLVariables[i].split('=');
                queryParams[sParameterName[0]] = sParameterName[1];
            }

            return queryParams;
        }
    });
</script>

<!-- Lazy loading -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const lazyLoadImages = document.querySelectorAll("[loading='lazy']");

        const lazyLoad = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    const url = img.dataset.src;
                    const srcset = img.dataset.srcset;


                    if (url) {
                        img.setAttribute("src", url);
                        if(srcset)
                            img.setAttribute("srcset",url+" "+srcset);
                        img.removeAttribute("loading");
                    }

                    observer.unobserve(img);
                }
            });
        };

        const observer = new IntersectionObserver(lazyLoad, {
            root: null,
            rootMargin: "0px 0px 100px 0px",
            threshold: 0.1
        });

        lazyLoadImages.forEach(img => observer.observe(img));
    });
</script>