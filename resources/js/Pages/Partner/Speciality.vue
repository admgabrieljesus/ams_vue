<template>
	<AppLayout>
		<template #header>
			<h1 class="font-semibold text-xl text-gray-800 leading-tight">
				Vinculação de Conveniado à Especialidade(s)
			</h1>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="px-2 bg-white overflow-hidden shadow-xl sm:rounded-lg">
					<form @submit.prevent="submit">
                            
                        <input type="hidden" v.model="form.partner_id">

						<fieldset>
							<legend>IDENTIFICAÇÃO</legend>

							<p class="mb-2">
								Preencha corretamente os dados do formulário. Estes dados serão
								usados na confecção do contrato de convênio.
							</p>

							<div class="mt-2">
								<label>NOME DO CONVENIADO</label>
								<p class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                    {{ partner.name }}
								</p>

							</div>

							<div class="mt-2">
								<label>ESPECIALIDADE</label>
								<select
									name="speciality_id"
									id="speciality_id"
									required
									v-model="form.speciality_id"
									class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
								>
									<option v-for="speciality in specialities" :key="speciality.id" 
                                        :value="speciality.id">{{ speciality.title }}</option>
								</select>
							</div>

						</fieldset>

					<button
							type="submit"
							class="mt-5 mb-5 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
						>
							Adicionar Especialidade
						</button>
					</form>
				</div>
			</div>
		</div>
	</AppLayout>
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
		partner: Object,
        specialities: Object,
	},
	setup(props) {
		const form = useForm({
			partner_id: props.partner.id,
			speciality_id: null,

		});
		return { form };
	},
	methods: {
		submit() {
			this.form.post(route("partners.specialities.store"));
		},
	},
});
</script>
