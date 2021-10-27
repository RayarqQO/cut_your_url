<?php 
	include_once "includes/header.php"; 
	$url = strtolower(trim($_GET['url']));

	if(isset($_GET['url']) && !empty($_GET['url']))
	{
		
		
		$link = dbQuery("SELECT * FROM links WHERE short_link = '$url'")->fetch();
		// if(empty($link))
		// {
		// 	echo 'Nothing was found';
		// 	die;
		// }

		dbUpdate("UPDATE links SET views = views + 1 WHERE short_link = '$url'");
		header('Location: ' . $link['login_link']);
		
	}
	$found_page = dbQuery('SELECT short_link FROM links');
	if($found_page != $url && $url != '')
	{
		return require "404.html";
	}
?>
<main class="container">
	<div class="row mt-5">
		<div class="col">
			<h2 class="text-center">Необходимо <a href="<?= getURL('register.php');?>">зарегистрироваться</a> или <a href="<?= getURL("login.php");?>">войти</a> под своей учетной записью</h2>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col">
			<h2 class="text-center">Пользователей в системе: <?= $user_count;?></h2>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col">
			<h2 class="text-center">Ссылок в системе: <?= $links_count;?></h2>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col">
			<h2 class="text-center">Всего переходов по ссылкам: <?= $views_count;?></h2>
		</div>
	</div>
</main>
<?php include_once "includes/footer.php"; ?>
