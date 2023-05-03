<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="site/index" class="brand-link">
        <!--  <img src="<?= $assetDir ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light"><?php echo Yii::$app->name ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
            <div class="sidebar-search-results">
                <div class="list-group"><a href="#" class="list-group-item">
                        <div class="search-title"><strong class="text-light"></strong>N<strong class="text-light"></strong>o<strong class="text-light"></strong> <strong class="text-light"></strong>e<strong class="text-light"></strong>l<strong class="text-light"></strong>e<strong class="text-light"></strong>m<strong class="text-light"></strong>e<strong class="text-light"></strong>n<strong class="text-light"></strong>t<strong class="text-light"></strong> <strong class="text-light"></strong>f<strong class="text-light"></strong>o<strong class="text-light"></strong>u<strong class="text-light"></strong>n<strong class="text-light"></strong>d<strong class="text-light"></strong>!<strong class="text-light"></strong></div>
                        <div class="search-path"></div>
                    </a></div>
            </div>
        </div>
        <div class="sidebar-search-results">
            <div class="list-group"><a href="#" class="list-group-item">
                    <div class="search-title"><strong class="text-light"></strong>N<strong class="text-light"></strong>o<strong class="text-light"></strong> <strong class="text-light"></strong>e<strong class="text-light"></strong>l<strong class="text-light"></strong>e<strong class="text-light"></strong>m<strong class="text-light"></strong>e<strong class="text-light"></strong>n<strong class="text-light"></strong>t<strong class="text-light"></strong> <strong class="text-light"></strong>f<strong class="text-light"></strong>o<strong class="text-light"></strong>u<strong class="text-light"></strong>n<strong class="text-light"></strong>d<strong class="text-light"></strong>!<strong class="text-light"></strong></div>
                    <div class="search-path"></div>
                </a></div>
        </div>
        <!-- Sidebar user panel (optional) -->
        <!--<div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= $assetDir ?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>-->

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                // TODO(SaTangTheValue): add Menu and add icon Menu
                'items' => [
                    [
                        'label' => 'Dashboard | ภาพรวม',
                        'icon' => 'chart-line',
                        'url' => ['dashboard/index'],
                        ##'badge' => '<span class="right badge badge-danger">New</span>'
                    ],
                    [
                        'label' => 'Expenses | รายรับรายจ่าย',
                        'icon' => 'money-bill',
                        'items' => [
                            ['label' => 'บันทึกรายรับรายจ่าย', 'url' => ['expenses/index'], 'iconStyle' => 'far'],
                            ['label' => 'ประเภทค่าใช้จ่าย', 'url' => ['expensescategory/index'], 'iconStyle' => 'far'],
                        ]
                        ##'badge' => '<span class="right badge badge-danger">New</span>'
                    ],
                    [
                        'label' => 'Statement | งบการเงิน',
                        'icon' => 'dollar-sign',
                        ##<i class="fad fa-dollar-sign"></i>
                        ##'badge' => '<span class="right badge badge-danger">New</span>'
                    ],
                    [
                        'label' => 'Investment | การลงทุน',
                        'icon' => 'hand-holding-usd',
                        ##<i class="fas fa-hand-holding-usd"></i>
                        'items' => [
                            ['label' => 'บันทึกการลงทุน', 'url' => ['investment/index'], 'iconStyle' => 'far'],
                            ['label' => 'ประเภทการลงทุน', 'url' => ['investmenttype/index'], 'iconStyle' => 'far'],
                        ]
                        ##'badge' => '<span class="right badge badge-danger">New</span>'
                    ],
                    [
                        'label' => 'Calendar | ปฏิทิน',
                        'icon' => 'calendar-alt',
                        ##<i class="fas fa-calendar-alt"></i>
                        ##'badge' => '<span class="right badge badge-danger">New</span>'
                    ],
                    [
                        'label' => 'Learning | การเรียน',
                        'icon' => 'graduation-cap',
                        ##<i class="fa-duotone fa-graduation-cap"></i>
                        ##'badge' => '<span class="right badge badge-danger">New</span>'
                    ],
                    [
                        'label' => 'To Do List | สิ่งที่ต้องทำ',
                        'icon' => 'clipboard-list',
                        ##<i class="fas fa-clipboard-list"></i>
                        'url' => ['todolist/index'],
                        ##'badge' => '<span class="right badge badge-danger">New</span>'
                    ],
                    [
                        'label' => 'Working | การทำงาน',
                        'icon' => 'briefcase',
                        ##<i class="fa-duotone fa-briefcase"></i>
                        'url' => ['working/index'],
                        ##'badge' => '<span class="right badge badge-danger">New</span>'
                    ],
                    [
                        'label' => 'Treasurer | งานเหรัญญิก',
                        'icon' => 'balance-scale',
                        ##<i class="fas fa-balance-scale"></i>
                        ##'badge' => '<span class="right badge badge-danger">New</span>'
                    ],
                    /*[
                        'label' => 'Starter Pages',
                        'icon' => 'tachometer-alt',
                        'badge' => '<span class="right badge badge-info">2</span>',
                        'items' => [
                            ['label' => 'Active Page', 'url' => ['site/index'], 'iconStyle' => 'far'],
                            ['label' => 'Inactive Page', 'iconStyle' => 'far'],
                        ]
                    ],
                    ['label' => 'Simple Link', 'icon' => 'th', 'badge' => '<span class="right badge badge-danger">New</span>'],
                    ['label' => 'Yii2 PROVIDED', 'header' => true],
                    ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                    ['label' => 'MULTI LEVEL EXAMPLE', 'header' => true],
                    ['label' => 'Level1'],
                    [
                        'label' => 'Level1',
                        'items' => [
                            ['label' => 'Level2', 'iconStyle' => 'far'],
                            [
                                'label' => 'Level2',
                                'iconStyle' => 'far',
                                'items' => [
                                    ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                                    ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                                    ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle']
                                ]
                            ],
                            ['label' => 'Level2', 'iconStyle' => 'far']
                        ]
                    ],
                    ['label' => 'Level1'],
                    ['label' => 'LABELS', 'header' => true],
                    ['label' => 'Important', 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger'],
                    ['label' => 'Warning', 'iconClass' => 'nav-icon far fa-circle text-warning'],
                    ['label' => 'Informational', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
         */
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>