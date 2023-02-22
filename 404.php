<?php
/* The template for displaying 404 pages (not found) */

get_header();
?>
	<style>
	.main-404 { 
		min-height: calc(100% - 65px);
		display: flex;
		flex-direction: column;
		justify-content: center ;
		align-items: center;
	}
	.wrapper-404 {
		display: flex;
		flex-direction: column;
		justify-content: center ;
		align-items: center;
		flex-grow: 1;
	}
	.page-title_1 {
		font-size: 84px;
		text-align: center;
	}
	.page-title_2 {
		font-size: 64px;
	}
	</style>
	<main id="primary" class="main-404">
		
		<div class="wrapper-404">
			<h1 class="page-title_1"><?php esc_html_e( '404', 'mogothemplate' ); ?></h1>
			<h1 class="page-title_2"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'mogothemplate' ); ?></h1>
		</section>
		</div>
	</main>
<?php
get_footer();
