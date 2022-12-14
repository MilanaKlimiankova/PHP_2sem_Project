<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<div class = "header">
	<object
	  type="image/svg+xml"
	  data="http://localhost/gamekm/assets/images/logo.svg"
	  class = "logo">
	</object>

	<ul type="none" class = "menu">
		<li><a href="http://localhost/gamekm/index.php">Главная</a></li>
		<li><a href="http://localhost/gamekm/about.php">Об игре</a></li>
		<li><a href="http://localhost/gamekm/feed.php">Лента</a></li>
	</ul>
	
	<ul type="none" class = "icons">
		<li>
			<svg id ='burger'width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg"  onmouseover="openMenu('menu-window')" onmouseout="setTimeout(closeMenu,3000, 'menu-window')">
				<defs>
					<filter id="shadow0" class="shadow">
				      <feDropShadow dx="0" dy="0" stdDeviation="1.5" flood-color="#F4BF00" />
				    </filter>
				</defs>
				<path d="M1 0C0.447715 0 0 0.447715 0 1C0 1.55228 0.447715 2 1 2V0ZM19 2C19.5523 2 20 1.55228 20 1C20 0.447715 19.5523 0 19 0V2ZM1 10C0.447715 10 0 10.4477 0 11C0 11.5523 0.447715 12 1 12V10ZM19 12C19.5523 12 20 11.5523 20 11C20 10.4477 19.5523 10 19 10V12ZM1 20C0.447715 20 0 20.4477 0 21C0 21.5523 0.447715 22 1 22V20ZM19 22C19.5523 22 20 21.5523 20 21C20 20.4477 19.5523 20 19 20V22ZM1 2H19V0H1V2ZM1 12H19V10H1V12ZM1 22H19V20H1V22Z" fill="#F4BF00" filter="url(#shadow0)"/>
				</svg>

		</li>
		<li><a href="http://localhost/gamekm/create-post.php">
			<svg id='pencil' width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<defs>
					<filter id="shadow" class="shadow">
				      <feDropShadow dx="0" dy="0" stdDeviation="1.5" flood-color="#8EF1FF" />
				    </filter>
				</defs>
				<path d="m22.567 6.533-5.103-5.105a1.66 1.66 0 0 0-2.331 0l-13.7 13.703a1.683 1.683 0 0 0-.483 1.166v5.104a1.649 1.649 0 0 0 1.648 1.649h19.18a.735.735 0 0 0 0-1.47H9.854L22.567 8.864A1.66 1.66 0 0 0 23.05 7.7a1.66 1.66 0 0 0-.483-1.166Zm-20.093 9.64L12.645 5.998l5.352 5.353L7.772 21.58H2.598a.179.179 0 0 1-.178-.179v-5.104c0-.047.02-.091.054-.124ZM21.528 7.82l-.002.002-2.488 2.488-5.352-5.353 2.488-2.488.001-.002a.166.166 0 0 1 .246 0l.002.002 5.103 5.104.002.001a.167.167 0 0 1 0 .246Z" fill="#8EF1FF" stroke="#8EF1FF" stroke-width=".1" filter="url(#shadow)"/></svg>

		</a>
		</li>
		<li>
			<svg id='user' onmouseover="openMenu('small-window')" onmouseout="setTimeout(closeMenu ,3000, 'small-window')" width="21" height="22"  fill="none" xmlns="http://www.w3.org/2000/svg">
				<defs>
					<filter id="shadow1" class="shadow">
				      <feDropShadow dx="0" dy="0" stdDeviation="1.5" flood-color="#FF96BC" />
				    </filter>
				</defs>

				<path d="M10 11.407a5.058 5.058 0 0 0 3.536-1.432A4.834 4.834 0 0 0 15 6.52c0-1.297-.527-2.54-1.464-3.457A5.058 5.058 0 0 0 10 1.63a5.058 5.058 0 0 0-3.536 1.432A4.834 4.834 0 0 0 5 6.519c0 1.296.527 2.54 1.464 3.456A5.058 5.058 0 0 0 10 11.407Zm0 1.63a6.744 6.744 0 0 1-4.714-1.91A6.446 6.446 0 0 1 3.333 6.52c0-1.73.703-3.387 1.953-4.61A6.744 6.744 0 0 1 10 0c1.768 0 3.464.687 4.714 1.91a6.446 6.446 0 0 1 1.953 4.609 6.446 6.446 0 0 1-1.953 4.609A6.744 6.744 0 0 1 10 13.037Zm8.333 8.148v-2.444c0-.649-.263-1.27-.732-1.729a2.529 2.529 0 0 0-1.768-.716H4.167c-.663 0-1.3.258-1.768.716a2.417 2.417 0 0 0-.732 1.729v2.444a.806.806 0 0 1-.244.576.843.843 0 0 1-1.179 0A.806.806 0 0 1 0 21.185v-2.444c0-1.08.439-2.117 1.22-2.881a4.215 4.215 0 0 1 2.947-1.193h11.666c1.105 0 2.165.429 2.947 1.193.781.764 1.22 1.8 1.22 2.88v2.445a.806.806 0 0 1-.244.576.843.843 0 0 1-1.179 0 .806.806 0 0 1-.244-.576Z" fill="#FF96BC" filter="url(#shadow1)"/>
			</svg>
		</li>
		
	</ul>
	</div>

<div id='small-window'class='small-window' style="height: 90px;">
	<ul type="none">
		<li>
			<?php
			
			echo "<a href=\"http://localhost/gamekm/cabinet.php?user_id=".$_GET['user_id']."\">Профиль</a>";
			?>
			
		</li>
		<!-- <li><a href="http://localhost/gamekm/settings.php">Настройки</a></li> -->
		<li><a href="modules/auth/auth_out.php">Выйти</a></li>
	</ul>
</div>

<div id='menu-window'>
	<ul type="none">
		<li><a href="http://localhost/gamekm/index.php">Главная</a></li>
		<li><a href="http://localhost/gamekm/about.php">Об игре</a></li>
		<li><a href="http://localhost/gamekm/feed.php">Лента</a></li>
	</ul>


<script src="http://localhost/gamekm/functions/small-window.js"></script>