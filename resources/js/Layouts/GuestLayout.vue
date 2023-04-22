<template>
	<div>
		<Head :title="title" />

		<div
			class="grid grid-cols-12 text-white"
			style="
				background-color: rgb(61, 144, 158);
				border-bottom-color: rgba(0, 0, 0, 0.05);
				border-bottom-style: solid;
				border-bottom-width: 1px;
				box-sizing: border-box;
				color: rgb(255, 255, 255);
				font-family: Arial, Helvetica, sans-serif;
				font-size: 18px;
				line-height: 26.05px;
				min-height: 40px;
				padding-top: 5px;
			"
		>
			<div class="col-span-12 sm:col-span-6 text-center">
				<span class="fa fa-comments-o"></span>
				<span>
					<a href="https://aepetba.org.br/v1/contato/" target="_blank">
						FALE COM A DIRETORIA DA AEPET BAHIA
					</a></span
				>
			</div>

			<div class="col-span-12 sm:col-span-2 text-center">
				<span class="fa fa-phone"></span>
				<span>(71) 3012-4172</span>
			</div>

			<div class="col-span-12 sm:col-span-2 text-center">
				<span class="fa fa-whatsapp"></span>
				<span>
					<a
						target="_blank"
						href="https://api.whatsapp.com/send?phone=5571983568081&text=Ol%C3%A1,"
					>
						(71) 9 8356-8081
					</a></span
				>
			</div>

			<div class="col-span-12 sm:col-span-2 text-center">
				<span class="fa fa-envelope"></span>
				<span>
					<a href="mailto:bahia@aepet.org.br" target="_blank">
						bahia@aepet.org.br
					</a></span
				>
			</div>
		</div>

		<div
			class="grid grid-cols-12 text-white"
			style="
				color: rgb(0, 0, 0);
				font-family: Arial, Helvetica, sans-serif;
				background-color: rgb(230, 230, 230);
				font-size: 16px;
				line-height: 26.05px;
				padding: 15px;
			"
		>
			<div class="col-span-12 sm:col-span-6 text-center ml-5">
				<a href="https://aepetba.org.br/v1/">
					<img
						style="width: 250px; height: 76px;"
						src="/images/logo-AEPETBA.png"
					/>
				</a>
			</div>
			<div
				class="col-span-12 sm:col-span-6 text-center ml-5"
				style="color: rgb(5, 1, 75);"
			>
				<p>VOCÊ ESTÁ NO AMBIENTE DO SISTEMA AMS AEPET-BA.</p>
				<p>CLIQUE NA LOGO PARA VOLTAR AO SITE DA AEPET BAHIA.</p>
			</div>
		</div>

		<jet-banner />

		<div class="min-h-screen bg-gray-100">
			<nav class="bg-white border-b border-gray-100">
				<!-- Primary Navigation Menu -->
				<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
					<div class="flex justify-between h-16">
						<div class="flex">
							<!-- Logo -->
							<div class="flex-shrink-0 flex items-center">
								<Link :href="route('index')">
									<jet-application-mark class="block h-9 w-auto" />
								</Link>
							</div>
						</div>

						<div class="hidden sm:flex sm:items-center sm:ml-6">
							<div class="ml-3 relative"></div>

							<!-- Settings Dropdown -->
						</div>

						<!-- Hamburger -->
					</div>
				</div>

				<!-- Responsive Navigation Menu -->
			</nav>

			<!-- Page Heading -->
			<header class="bg-white shadow" v-if="$slots.header">
				<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
					<slot name="header"></slot>
				</div>
			</header>

			<!-- Page Content -->
			<main>
				<slot></slot>
			</main>
		</div>
		
		<footer-default />
		
	</div>
</template>

<script>
import { defineComponent } from "vue";
import JetApplicationMark from "@/Jetstream/ApplicationMark.vue";
import JetBanner from "@/Jetstream/Banner.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import FooterDefault from "@/Pages/Ui/Footer.vue";

export default defineComponent({
	props: {
		title: String,
	},

	components: {
		Head,
		JetApplicationMark,
		JetBanner,
		Link,
		FooterDefault,
	},
});
</script>
