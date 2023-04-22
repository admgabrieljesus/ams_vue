<template>
	<app-layout title="Cadastro de Conveniados">
		<template #header>
			<h1 class="font-semibold text-xl text-gray-800 leading-tight">
				Lista de Dependentes
			</h1>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
					<h1 class="ml-1 mt-5 mb-5">
						Listagem de Dependentes de {{ associate.name }} -
						{{ associate.code }}
					</h1>

					<table class="mt-5 min-w-full divide-y divide-gray-200">
						<tr>
							<th
								scope="col"
								class="px-1 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
							>
								Nome
							</th>
							<th
								scope="col"
								class="px-1 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
							>
								Matrícula
							</th>
							<th
								scope="col"
								class="px-1 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
							>
								Parentesco
							</th>
							<th
								scope="col"
								class="px-1 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
							>
								CPF
							</th>
							<th
								scope="col"
								class="px-1 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
							>
								Data Nascimento
							</th>
							<th
								scope="col"
								class="px-1 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
							>
								Idade
							</th>
							<th
								scope="col"
								class="px-1 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
							>
								Ações
							</th>
						</tr>
						<tr v-for="d in dependents" :key="d.id">
							<td>{{ d.name }}</td>
							<td>{{ associate.code }} - {{ d.code }}</td>
							<td>{{ d.kindship.title }}</td>
							<td>{{ d.cpf }}</td>
							<td>{{ formatDate(d.birth) }}</td>
							<td>{{ calcAge(d.birth) }} anos</td>
							<td>
								<a
									target="_blank"
									alt="Carteira"
									:href="route('cards.show', d.id)"
								>
									<svg
										xmlns="http://www.w3.org/2000/svg"
										viewBox="0 0 24 24"
										width="24"
										height="24"
									>
										<path
											class="heroicon-ui"
											d="M6 2h12a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4c0-1.1.9-2 2-2zm0 2v16h12V4H6zm6 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"
										/>
									</svg>
								</a>
							</td>
						</tr>
					</table>
				</div>
				<div>
					<Link
						:href="route('dependents.create')"
						class="hover:bg-blue-400 group flex items-center rounded-md bg-blue-500 text-white text-sm font-medium pl-2 pr-3 py-2 shadow-sm mt-10"
					>
						Incluir Dependente
					</Link>
				</div>
			</div>
		</div>
	</app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";


export default defineComponent({
	components: {
		AppLayout,
		Head,
		Link,
	},
	props: {
		associate: Object,
		dependents: Object,
	},
	methods: {
		formatDate(dateString) {
			const date = new Date(dateString);
			return new Intl.DateTimeFormat("default", { dateStyle: "long" }).format(
				date
			);
		},
		calcAge(dataNasc) {
         //   alert(dataNasc);
			var dataAtual = new Date();
			var anoAtual = dataAtual.getFullYear();
			var anoNascParts = dataNasc.split("-");
			var diaNasc = anoNascParts[2];
			var mesNasc = anoNascParts[1];
			var anoNasc = anoNascParts[0];
			var idade = anoAtual - anoNasc;
			var mesAtual = dataAtual.getMonth() + 1;
			if (mesAtual < mesNasc) {
				idade--;
			} else {
				if (mesAtual == mesNasc) {
					if (new Date().getDate() < diaNasc) {
						idade--;
					}
				}
			}
			return idade;
		},
	},
});
</script>
