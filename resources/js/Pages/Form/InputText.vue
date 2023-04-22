<template>
	<div class="mt-2">
		<label>{{ title }}</label>
		<input
			:required="required"
			type="text"
			v-model="value"
			v-maska="mask"
			class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
		/>
		<p class="text-red-700 bg-yellow-400" v-if="error">{{ error }}</p>
	</div>
</template>

<script>
import { defineComponent } from "vue";
import { maska } from "maska";

export default defineComponent({
	props: {
		title: String,
		modelValue: String,
		required: Boolean,
		error: String,
		mask: String
	},
	directives: { maska },
	emits: ["update:modelValue"],
	computed: {
		value: {
			get() {
				return this.modelValue;
			},
			set(value) {
				this.$emit("update:modelValue", value);
			},
		},
	},
});
</script>
