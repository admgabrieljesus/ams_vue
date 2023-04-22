<template>
	<app-guest title="Cadastro de Conveniados">
		<template #header>
			<h1 class="font-semibold text-xl text-gray-800 leading-tight">
				Pesquisa de Conveniado
			</h1>
		</template>

		<div class="py-6">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="px-4 py-2 bg-white overflow-hidden shadow-xl sm:rounded-lg">
					<form @submit.prevent="submit" method="get">

                        <fieldset>
							<legend class="font-bold mt-6 bg-slate-400">CRITÉRIOS DE PESQUISA</legend>
							<p class="mb-2">
								Preencha corretamente um ou mais critérios para localizar o conveniado.
							</p>
                           
							<input-select
								title="ESPECIALIDADES"
								v-model="form.specialities"
								:itens="specialities"
								required
							/>

						</fieldset>


						<button
							type="submit"
							class="mt-5 mb-5 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
						>
							Pesquisar
						</button>
					</form>
				</div>
			</div>
		</div>
	</app-guest>
</template>

<script>
import { defineComponent } from "vue";
import AppGuest from "@/Layouts/GuestLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
import InputText from "@/Pages/Form/InputText.vue";
import InputNumber from "@/Pages/Form/InputNumber.vue";
import InputSelect from "@/Pages/Form/InputSelect.vue";
import ContractDoctor from "@/Pages/Contracts/Doctor.vue";
import ContractCompany from "@/Pages/Contracts/Company.vue";
import ContractLaboratory from "@/Pages/Contracts/Laboratory.vue";
import ContractRadiology from "@/Pages/Contracts/Radiology.vue";

export default defineComponent({
	components: {
		AppGuest,
		Head,
		Link,
		InputText,
		InputNumber,
		InputSelect,
		ContractDoctor,
		ContractCompany,
		ContractLaboratory,
		ContractRadiology,
	},
	setup(props) {
		const form = useForm({
			specialities: null,
		});
		return { form };
	},
    props: {
		specialities: Object,
	},
	methods: {
		submit() {
			this.form.get(route("partners.result"));
		},
	},
});
</script>
