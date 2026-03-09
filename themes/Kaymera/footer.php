<footer class="footer">
    <div class="footer-top">
        <div class="wrap">
            <?php $menu = new MenuConstructorSA(); echo $menu->footer(); ?>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="wrap">
            <div class="footer-bottom-inner">
                <span class="copyright mdc-typography--caption">
                    <?php the_copywrite(); ?>
                </span>
                <?php the_social(); ?>
                <span class="developed mdc-typography--caption">Designed and Developed by <a href="https://mavericks.agency/" target="_blank">Mavericks Agency</a></span>
            </div>
        </div>
    </div>
    <?php wp_footer(); ?>
</footer>
</body>
</html>
