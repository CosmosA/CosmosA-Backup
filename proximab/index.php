<!DOCTYPE html>
<html lang="en" class="mdl-js">

<head>
    <?php
        include '../meta.tmpl';
        include 'meta-info.tmpl';
    ?>
    <meta name="theme-color" content="#0d1b42">
    <meta name="msapplication-navbutton-color" content="#0d1b42">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="stylesheet" href="assets/material.css">
    <style type="text/css">
        .mdl-layout__drawer-button {
            color: #eee;
        }
    </style>
</head>

<body>
    <div class="mdl-layout mdl-js-layout" style="background: url('assets/img_milkyway.jpg') center / cover;">
        <header class="mdl-layout__header mdl-layout__header--transparent">
            <div class="mdl-layout__header-row">
                <span class="mdl-layout-title">Proxima B</span>
                <div class="mdl-layout-spacer"></div>
                <nav class="mdl-navigation">
                    <?php
                        $navs = json_decode(file_get_contents('navs.json'), true);
                        foreach ($navs as $key => $value) {
                            echo '<a class="mdl-navigation__link" href="' . $value . '">' . $key . '</a>';
                        }
                    ?>
                </nav>
            </div>
        </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">Proxima B</span>
            <nav class="mdl-navigation">
                <?php
                    foreach ($navs as $key => $value) {
                        echo '<a class="mdl-navigation__link" href="' . $value . '">' . $key . '</a>';
                    }
                ?>
            </nav>
        </div>
        <main class="mdl-layout__content">
            <div id="top"></div>
            <div style="padding-top: 168px; padding-bottom: 168px;">
                <h1 class="mdl-color-text--white" style="text-align: center; text-shadow: 0 2px 2px #888">Proxima B</h1>
                <h4 class="mdl-color-text--white" style="text-align: center; text-shadow: 0 2px 2px #888">Artificial Ecosystem Simulation</h4>
                <div style="background: url('assets/ic_keyboard_arrow_down_white.png') center / cover; cursor: pointer; margin: 0 auto; margin-top: 54px; width: 54px; height: 54px;" onclick="scrollTo('#logo');">
                </div>
            </div>
            <div class="mdl-grid">
                <div class="mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--8-col mdl-cell--2-offset-desktop" id="logo" style="padding: 24px 24px 24px 24px">
                    <div style="background: url('../assets/img_proximab.png') center / cover; border-radius: 8px; margin: 0 auto; width: 256px; height: 256px;">
                    </div>
                </div>
                <div class="mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--8-col mdl-cell--2-offset-desktop" style="padding: 0 24px 24px 24px">
                    <h4>Proxima B</h4>
                    센타우루스자리 프록시마 b 또는 프록시마 b는 태양계에서 제일 가까운 항성이자 적색왜성인 센타우루스자리 프록시마에서 발견된 외계 행성이다. 지구에서 가장 가까운 외계 행성 이며 생명체 거주가능 영역(골디락스존)을 돌고 있다.<br><br>
                    출처: <a href="https://ko.m.wikipedia.org/wiki/센타우루스자리_프록시마_b">위키백과</a>
                </div>
            </div>
            <?php include '../footer.tmpl'; ?>
        </main>
    </div>
    <?php include '../scripts.tmpl'; ?>
</body>

</html>