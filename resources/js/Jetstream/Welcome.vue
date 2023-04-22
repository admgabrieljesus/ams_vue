<template>
	<div class="sm:px-10 bg-white border-b border-gray-200">
		<!-- <div>
			<jet-application-logo class="block h-12 w-auto" />
		</div> -->

		<div class="mt-2 text-2xl">
			Bem-vindo ao sistema de informações AMS.AEPET!
		</div>

		<div class="mt-2 text-gray-500">
			Use o menu ou botões para realizar as ações desejadas.
		</div>

		<div
			class="grid grid-cols-1 md:grid-cols-4 md:gap-4 gap-4 mt-10 mb-10 ml-5 mr-5"
		>
			<div class="mt-4 mb-4">
				<button-gradient title="GESTÃO DE ASSOCIAODS" link="associates.index" />
			</div>
			<div class="mt-4 mb-4">
				<button-gradient title="AUTORIZAR DEPENDENTES" link="dashboard" />
			</div>
			<div class="mt-4 mb-4">
				<button-gradient title="RELATÓRIO DE ASSOCIADOS" link="dashboard" />
			</div>
			<div class="mt-4 mb-4">
				<button-gradient title="RELATÓRIO DE DEPENDENTES" link="dashboard" />
			</div>
			<div class="mt-4 mb-4">
				<button-gradient title="GESTÃO DE CREDENCIADOS" link="dashboard" />
			</div>
			<div class="mt-4 mb-4">
				<button-gradient title="EMISSÃO DE CARTEIRA AMS" link="dashboard" />
			</div>
			<div class="mt-4 mb-4">
				<button-gradient title="RELATÓRIO DE MÉDICOS" link="dashboard" />
			</div>
			<div class="mt-4 mb-4">
				<button-gradient title="RELATÓRIO DE CLÍNICAS" link="dashboard" />
			</div>
		</div>
	</div>
</template>

<script>
import { defineComponent } from "vue";
import JetApplicationLogo from "@/Jetstream/ApplicationLogo.vue";
import { Link } from "@inertiajs/inertia-vue3";
import ButtonGradient from "@/Pages/Ui/ButtonGradient.vue";

export default defineComponent({
	components: {
		JetApplicationLogo,
		Link,
		ButtonGradient,
	},
});
</script>
