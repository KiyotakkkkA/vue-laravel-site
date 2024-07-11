<template>
    <footer class="footer">
        <div class="contact-info">
            <ul>
                <li>Адрес: ул. Примерная, 1</li>
                <li>Телефон: +7 123 456-78-90</li>
                <li>
                    E-mail:
                    <a href="mailto:info@shaurma.com">info@shaurma.com</a>
                </li>
            </ul>
        </div>
        <p>Мы открыты с 10:00 до 22:00</p>
        <p>Подпишитесь на наши соцсети:</p>
        <a href="#"
            ><img
                src="../../../public/media/vk_icon_asset.png"
                class="social"
                width="25"
                height="25"
        /></a>
        <a href="#">
            <img
                src="../../../public/media/telegram_icon_asset.png"
                class="social"
                width="25"
                height="25"
        /></a>
        <a href="#">
            <img
                src="../../../public/media/whatsup_icon_asset.png"
                class="social"
                width="25"
                height="25"
        /></a>
        <p>&copy; 2022 Shaurma.com</p>
    </footer>
</template>

<style scoped>
.social {
    margin-left: 10px;
    margin-right: 10px;
}

.footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px;
}

.footer p {
    margin: 5px 0;
}

.footer ul {
    list-style-type: none;
    padding: 0;
    margin: 10px 0;
}

.footer li {
    display: inline;
    margin-right: 10px;
}

.footer a {
    color: #fff;
    text-decoration: none;
}
</style>
