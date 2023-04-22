<template>
	<app-layout title="Cadastro de Conveniados">
		<template #header>
			<h1 class="font-semibold text-xl text-gray-800 leading-tight">
				Lista de Depedentes
			</h1>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
					<table>
                            <thead class="font-bold bg-gray-300 border-b-2">
                                <td class="px-4 py-2">ID</td>
                                <td class="px-4 py-2">Nome</td>
                                <td class="px-4 py-2">Ativo?</td>
                                <td class="px-4 py-2">Ações</td>
                            </thead>
                            <tbody>
                                <tr v-for="dependent in dependents" :key="dependent.id">
                                    <td class="px-4 py-2">{{ dependent.id }}</td>
                                    <td class="px-4 py-2">{{ dependent.name }}</td>
                                    <td class="px-4 py-2">{{ dependent.active }}</td>
                                    <td class="px-4 py-2 font-extrabold">
                                        <Link
                                            class="text-green-700"
                                            :href="route('dependents.detail', dependent.id)"
                                        >
                                            Detalhes
                                        </Link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- <pagination :links="dependents.links" /> -->
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
		dependents: Object,
	},

});
</script>
