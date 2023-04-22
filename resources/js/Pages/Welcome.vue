<template>
	<Head title="Welcome" />

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
		<div class="col-span-12 sm:col-span-6 text-left ml-5">
			<a target="_blank" href="https://aepetba.org.br/v1/">
				<img
					style="width: 250px; height: 76px;"
					alt="Site logo"
					src="images/logo-AEPETBA.png"
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

	<div class="font-sans text-gray-900 antialiased">
		<div
			class="grid grid-cols-1 md:grid-cols-4 items-center md:gap-4 mt-10 mb-10 ml-5 mr-5"
		>
			<div class="justify-self-center mb-5">
				<img src="images/tela-inicial.png" />
			</div>

			<div class="justify-self-center mb-5">
				<Link :href="route('login')" class="text-sm text-gray-700 underline">
					<img src="images/portal-associado.png" />
				</Link>
			</div>

			<div class="justify-self-center mb-5">
				<Link
					:href="route('partners.menu')"
					class="text-sm text-gray-700 underline"
				>
					<img src="images/ser-credenciadobahia.png" />
				</Link>
			</div>

			<div class="justify-self-center mb-5">
				<Link
					:href="route('partners.search')"
					class="text-sm text-gray-700 underline"
				>
					<img src="images/busca-credenciado.png" />
				</Link>
			</div>
		</div>

		<div
			class="grid grid-cols-1 md:grid-cols-4 md:gap-4 gap-4 mt-10 mb-10 ml-5 mr-5"
		>
			<div class="justify-self-center">
				<a
					target="_blank"
					href="https://aepetba.org.br/v1/o-que-e-ams-aepet-ba/"
				>
					<img src="images/oquee-amsaepet.png" />
				</a>
			</div>

			<div class="justify-self-center">
				<a
					target="_blank"
					href="https://aepetba.org.br/v1/quem-pode-ser-conveniado/"
				>
					<img src="images/ser-credenciado.png" />
				</a>
			</div>

			<div class="justify-self-center">
				<a
					target="_blank"
					href="https://aepetba.org.br/v1/quem-pode-ser-dependente/"
				>
					<img src="images/incluir-dependente.png" />
				</a>
			</div>

			<div class="justify-self-center">
				<a
					target="_blank"
					href="https://aepetba.org.br/v1/politica-de-privacidade/"
				>
					<img src="images/ṕolitica-privacidade.png" />
				</a>
			</div>
		</div>
	</div>

	<footer-default />
</template>

 <script>
import { defineComponent } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import FooterDefault from "@/Pages/Ui/Footer.vue";

export default defineComponent({
	components: {
		Head,
		Link,
		FooterDefault,
	},

	props: {
		canLogin: Boolean,
		canRegister: Boolean,
		laravelVersion: String,
		phpVersion: String,
	},
});
</script>
