<template>
	<app-layout title="Cadastro de Conveniados">
		<template #header>
			<h1 class="font-semibold text-xl text-gray-800 leading-tight">
				Documentos
			</h1>
		</template>

        <object :type="content_type"
            :data="`/${file}`"
            width="800px"
            height="400px">
        </object>

	</app-layout>
</template>

<script>
export default {
	props: {
		file: Object,
		content_type: Object,
	},
};
</script>