<template>
	<AppLayout>
		<template #header>
			<h1 class="font-semibold text-xl text-gray-800 leading-tight">
				Relatórios
			</h1>
		</template>

		<div class="ml-10 mt-4">
			<p>Relatório de Associados</p>

			<form 	@submit.prevent="submit">
				<select class="p-4 mr-2 rounded" name="level" id="level" v-model="form.level">
					<option value="">-- nível --</option>
					<option value="1">Ativos</option>
					<option value="2">Aposentados</option>
				</select>
				<select class="p-4 mr-2 rounded" name="active" id="active" v-model="form.active">
					<option value="">-- condição --</option>
					<option value="1">Associados</option>
					<option value="0">Não Associados</option>
				</select>
				<select class="p-4 mr-2 rounded" name="type" id="type" v-model="form.type">
					<option value="">-- tipo --</option>
					<option value="phone">Telefones</option>
					<option value="email">Emails</option>
					<option value="address">Endereços</option>
					<option value="all">Completo</option>
				</select>
				<button class="p-4 mr-2 rounded">
					Criar Relatório
				</button>
			</form>
		</div>
		<hr />

		<!-- <div class="ml-10 mt-4">
			<Link
				:href="route('reports.associates.emails')"
				class="text-sm text-gray-700"
			>
				Lista de Emails de Associados
			</Link>
		</div>
		<div class="ml-10">
			<Link
				:href="route('reports.associates.phones')"
				class="text-sm text-gray-700"
			>
				Lista de Telefones de Associados
			</Link>
		</div> -->
	</AppLayout>
</template>

<script>
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { defineComponent } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import AppLayout from "@/Layouts/AppLayout.vue";

export default defineComponent({
	props: {
		title: String,
		errors: Object,
	},

	components: {
		Head,
		Link,
		AppLayout,
 
	},

setup () {
    const form = reactive({
      level: null,
      active: null,
      type: null,
    })

    function submit() {
      Inertia.get('/reports/associates', form)
    }

    return { form, submit }
  },
	
});
</script>
