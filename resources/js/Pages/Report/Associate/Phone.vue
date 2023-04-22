<template>
	<app-layout>
		<div class="ml-2 mt-2 w-full">
			<section class="py-1 bg-blueGray-50">
				<div class="w-full xl:w-8/12 mb-2 xl:mb-0 px-2 mx-auto mt-2">
					<div
						class="relative flex flex-col min-w-0 break-words bg-white w-full mb-2 shadow-lg rounded"
					>
						<div class="rounded-t mb-0 px-2 py-3 border-0">
							<div class="flex flex-wrap items-center">
								<div class="relative w-full px-s max-w-full flex-grow flex-1">
									<h3 class="font-semibold text-base text-blueGray-700">
										Lista de Telefones de Associados
									</h3>
								</div>
								<!-- <div
									class="relative w-full px-4 max-w-full flex-grow flex-1 text-right"
								>
									Exportar para:
									<button
										class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
										type="button"
									>
										XLS
									</button>
									<button
										class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
										type="button"
									>
										PDF
									</button>
								</div> -->
							</div>
						</div>

						<div class="block w-full overflow-x-auto">
							<table class="items-center bg-transparent w-full border-collapse">
								<thead>
									<tr>
										<th
											class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
										>
											MATRÍCULA
										</th>
										<th
											class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
										>
											ASSSOCIADO
										</th>
										<th
											class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
										>
											TELEFONE
										</th>
									</tr>
								</thead>

								<tbody
									v-for="associate in associates"
									:key="associate.phones.number"
								>
									<tr v-for="phone in associate.phones" :key="phone.id">
										<th
											class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-1 text-left text-blueGray-700"
										>
											{{ associate.code }}
										</th>
										<td
											class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-1"
										>
											{{ associate.name }}
										</td>
										<td
											class="border-t-0 px-6 align-center border-l-0 border-r-0 text-sm whitespace-nowrap p-1"
										>
											({{ phone.ddd }}) {{ formatPhone(phone.number) }}
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<footer class="relative pt-8 pb-6 mt-16">
					<div class="container mx-auto px-4">
						<div
							class="flex flex-wrap items-center md:justify-between justify-center"
						>
							<div class="w-full md:w-6/12 px-4 mx-auto text-center">
								<div class="text-sm text-blueGray-500 font-semibold py-1">
									Total de Associados: {{ associates.length }}
								</div>
							</div>
						</div>
					</div>
				</footer>
			</section>
		</div>
	</app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";

export default {
	components: {
		AppLayout,
	},
	data() {
		return {
			count: 0,
		};
	},
	props: {
		associates: Object,
	},
	methods: {
		inc() {
			this.count = parseInt(this.count + 1);
			return this.count;
		},
		formatPhone(phone) {
			const ativePhone = phone;
			const isCelular = ativePhone.length === 9;
			let maskPhone;
			if (isCelular) {
				const parte1 = ativePhone.slice(0, 1);
				const parte2 = ativePhone.slice(1, 5);
                const parte3 = ativePhone.slice(5, 9);
				maskPhone = `${parte1}.${parte2}-${parte3}`;
			} else {
				const parte1 = ativePhone.slice(0, 4);
				const parte2 = ativePhone.slice(4, 8);
				maskPhone = `${parte1}-${parte2}`;
			}
			return maskPhone;
		},
	},
};
</script>
