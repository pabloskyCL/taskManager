<template>
	<section class="flex items-center h-screen p-16 dark:bg-gray-900 dark:text-gray-100">
		<div class="container flex flex-col items-center justify-center px-5 mx-auto my-8">
			<div class="max-w-md text-center">
				<h2 class="mb-8 font-extrabold text-9xl dark:text-gray-600">
					<span class="sr-only">Error</span>404
				</h2>
				<p class="text-2xl my-5 font-semibold md:text-3xl">Lo sentimos, no encontramos esta pagina.</p>
                <router-link class="px-8 py-3 font-semibold rounded dark:bg-violet-400 dark:text-gray-900" to="/">Regresar al Inicio</router-link>
			</div>
		</div>
	</section>
</template>