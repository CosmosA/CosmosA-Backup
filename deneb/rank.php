<!DOCTYPE html>
<html lang="en" class="mdl-js">

<head>
    <?php
        include '../meta.tmpl';
        include 'meta-color.tmpl';
        include 'meta-info.tmpl';
    ?>
</head>

<body>
    <div class="mdl-color--grey-100 mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <span class="mdl-layout-title">Deneb</span>
            </div>
        </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">Deneb</span>
            <nav class="mdl-navigation">
                <?php
                    $navs = json_decode(file_get_contents('navs.json'), true);
                    foreach ($navs as $key => $value) {
                        echo '<a class="mdl-navigation__link" href="' . $value . '">' . $key . '</a>';
                    }
                ?>
            </nav>
        </div>
        <main class="mdl-layout__content">
            <div id="top"></div>
            <div class="mdl-grid">
                <div class="mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--8-col mdl-cell--2-offset-desktop" id="content" style="padding: 0 24px 24px 24px">
                    <h4>Rank&nbsp;<button id="menu" class="mdl-button mdl-js-button mdl-button--icon">
                        <i class="material-icons">more_vert</i>
                    </button></h4>
                    <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu mdl-js-ripple-effect" for="menu">
                        <?php
                            include_once 'library/Key.php';

                            $keys = json_decode(Key::getSortableKeys(), true);
                            $key = $_GET['key'];

                            foreach ($keys as $i => $value) {
                                echo '<li class="mdl-menu__item">';
                                if ($i === $key) {
                                    echo '<a class="mdl-color-text--grey-500" href="?key=' . $i . '" style="text-decoration: none;">' . $i . '</a>';
                                } else {
                                    echo '<a class="mdl-color-text--grey-800" href="?key=' . $i . '" style="text-decoration: none;">' . $i . '</a>';
                                }
                                echo '</li>';
                            }
                        ?>
                    </ul>
                    <ul class="mdl-list">
                        <?php
                            include_once 'library/User.php';

                            if (Key::isSortable($key)) {
                                $users = User::sortByData($key);
                                $i = 0;
                                foreach ($users as $id => $user) {
                                    echo '<li class="mdl-list__item mdl-list__item--two-line">';
                                    echo '<span class="mdl-list__item-primary-content">';
                                    echo '<span>' . ($i + 1) . ($i > 2 ? 'th' : ($i > 1 ? 'rd' : ($i === 1 ? 'nd': 'st'))) . '. ' . $user['name'] . '(' . $user['id'] . ')</span>';
                                    echo '<span class="mdl-list__item-sub-title">' . $user[$key] . '</span>';
                                    echo '</span>';
                                    echo '</li>';
                                    $i++;
                                }
                            } else if (!$key) {
                                echo '<li class="mdl-list__item mdl-list__item--two-line">';
                                echo '<span class="mdl-list__item-primary-content">';
                                echo '<span>Welcome</span>';
                                echo '<span class="mdl-list__item-sub-title">조회할 내용을 선택 해주세요.</span>';
                                echo '</span>';
                                echo '</li>';
                            } else {
                                echo '<li class="mdl-list__item mdl-list__item--two-line">';
                                echo '<span class="mdl-list__item-primary-content">';
                                echo '<span>Error</span>';
                                echo '<span class="mdl-list__item-sub-title">조회할 수 없는 데이터입니다.</span>';
                                echo '</span>';
                                echo '</li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <?php include '../footer.tmpl'; ?>
        </main>
    </div>
    <?php include '../scripts.tmpl'; ?>
</body>

</html>