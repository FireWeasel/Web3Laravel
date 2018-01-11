<template lang="html">
  <div>
    <p>{{ message.message }}</p>
    <small>{{ message.user_id }}</small>
  </div>
</template>

<script>
export default {
  props: ['message']
}
</script>

<style lang="css">
</style>
