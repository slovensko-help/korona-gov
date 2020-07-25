

</main>

<footer class="idsk-footer " role="contentinfo">
    <div class="govuk-width-container ">
        <div class="idsk-footer__meta">
            <div class="idsk-footer__meta-item footer-logo-wrap">
                <div class="footer-logo-inner">
                    <?php dynamic_sidebar( 'sidebar-3' ); ?>
                </div>
            </div>
            <div class="idsk-footer__meta-item idsk-footer__meta-item--grow">
                <?php dynamic_sidebar( 'sidebar-1' ); ?>
                <h2 class="govuk-visually-hidden">Dôležité odkazy</h2>
                <?php dynamic_sidebar( 'sidebar-2' ); ?>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
<style>
    div>div#botmedia-chat-note,
    div#botmedia-chat-widget>div+div:not(#botmedia-chat-content),
    div[id^="bot"]>div+div:not(:last-child){
        display:none !important;
    }
    div#botmedia-chat-button,
    div#botmedia-chat-button img{
        height: 70px;
        width: 70px;
    }
    @media (max-width: 576px) {
        div>div#botmedia-chat-widget {
            display:none !important;
        }
    }
</style>
<script>
    window.bChat = {
        "showChatNote": false,
        'image': 'https://cdn.covid.chat/logo.png',
        'text': 'Dôležité informácie o koronavíruse (COVID-19)',
        "autoOpen": false,
        "noAutoInit": false,
        "noHistory": true,
        "exitButton": true,
        "skipWelcome": true,
        "force": true,
        "ref": "welcome"
    };
    (function(d, s, id) {
        var js, bjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.async = true; js.id = id;
        js.src = "https://cdn.covid.chat/chat.js";
        bjs.parentNode.insertBefore(js, bjs);
    }(document, 'script', 'bmedia'));
</script>

<script>window.GOVUKFrontend.initAll()</script>
</body>
</html>
