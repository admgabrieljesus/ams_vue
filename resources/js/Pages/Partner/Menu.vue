<template>
	<app-guest title="Cadastro de Conveniados">
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Solicitação de Cadastro de Conveniado
			</h2>
		</template>

		<div class="py-2 px-2">
			<div class="max-w-full  mx-auto sm:px-6 lg:px-8">
				<div class="pl-3 pr-3 bg-white overflow-hidden shadow-xl sm:rounded-lg">
					<div>
						<p class="mb-2 mr-2 text-lg">
							Seja bem vindo ao cadastro de conveniados do sistema AMS/AEPET-BA!
						</p>
					</div>

					<div>
						<p class="mb-2 mr-2 text-lg">
							Clique na opção conforme a categoria desejada e inicie o cadastro.
						</p>
					</div>

					<div
						class="grid grid-cols-1 md:grid-cols-4 items-center md:gap-4 mt-10 mb-10 ml-5 mr-5"
					>
						<div class="justify-self-center mb-5">
							<Link
								:href="route('partners.add', { type: 'doctors' })"
								class="text-sm text-gray-700"
							>
								<img
									src="/images/cadastro-medicos.png"
									alt="Médicos(as) e Dentistas"
								/>
							</Link>
						</div>

						<div class="justify-self-center mb-5">
							<Link
								:href="route('partners.add', { type: 'companies' })"
								class="text-sm text-gray-700"
							>
								<img src="/images/cadastro-clinicas.png" alt="Clínicas" />
							</Link>
						</div>

						<div class="justify-self-center mb-5">
							<Link
								:href="route('partners.add', { type: 'radiologies' })"
								class="text-sm text-gray-700"
							>
								<img
									src="/images/cadastro-clinicas-imagem.png"
									alt="Clínicas de Imagem"
								/>
							</Link>
						</div>

						<div class="justify-self-center mb-5">
							<Link
								:href="route('partners.add', { type: 'laboratories' })"
								class="text-sm text-gray-700"
							>
								<img
									src="/images/cadastro-laboratorios.png"
									alt="Laboratórios"
								/>
							</Link>
						</div>
					</div>
				</div>
			</div>
		</div>
	</app-guest>
</template>

<script>
import { defineComponent } from "vue";
import AppGuest from "@/Layouts/GuestLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
	components: {
		AppGuest,
		Head,
		Link,
	},
});
</script>
