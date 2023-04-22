<template>
	<app-layout title="Cadastro de Conveniados">
		<template #header>
			<h1 class="font-semibold text-xl text-gray-800 leading-tight">
				Lista de Conveniados
			</h1>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
					<table>
						<thead class="font-bold bg-gray-300 border-b-2">
							<td class="px-4 py-2">ID</td>
							<td class="px-4 py-2">Nome</td>
							<td class="px-4 py-2">CPF/CNPJ</td>
							<td class="px-4 py-2">Tipo</td>
							<td class="px-4 py-2">Ativo?</td>
							<td class="px-4 py-2">Ações</td>
						</thead>
						<tbody>
							<tr v-for="partner in partners" :key="partner.id">
								<td class="px-4 py-2">{{ partner.id }}</td>
								<td class="px-4 py-2">{{ partner.name }}</td>
								<td class="px-4 py-2">
									{{ partner.cpf != null ? partner.cpf : partner.cnpj }}
								</td>
								<td class="px-4 py-2">{{ getTypePartner(partner.type) }}</td>
								<td class="px-4 py-2">{{ showActive(partner.active) }}</td>
								<td class="px-4 py-2 font-extrabold">
									<Link
										class="text-green-700"
										:href="route('partners.detail', partner.id)"
									>
										Detalhes
									</Link>
								</td>
							</tr>
						</tbody>
					</table>
					<pagination :links="partners.links" />
				</div>
			</div>
		</div>
	</app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";

export default defineComponent({
	components: {
		AppLayout,
		Head,
		Link,
	},
	props: {
		partners: Object,
	},
	methods: {
		showActive(tipo) {
			let status = "Inativo";
			if (tipo == 1) {
				status = "Ativo";
			} else if (tipo == 2) {
				status = "Pendente";
			}
			return status;
		},
		getTypePartner(tipo) {
			switch (tipo) {
				case "DOCTORS":
					return "Pessoa Física";
					break;
				case "COMPANIES":
					return "Clínica Médica";
					break;
				case "RADIOLOGIES":
					return "Clínica de Radiologia";
					break;
				case "LABORATORIES":
					return "Laboratório";
					break;
				default:
					return "ERRO!";
					break;
			}
		},
	},
});
</script>
