<template lang="html">
  <div class="chat-log">
    <chat-message v-for="message in messages" :message="message" :key="message.id"></chat-message>
    <div class="empty" v-show="messages.length === 0">
      Nothing here...
    </div>
  </div>
</template>

<script>
export default {
  props: ['messages']
}
</script>

<style lang="css">
.chat-log div:nth-child(even) {
  background-color: #ccc;
}
.empty {
  padding: 1rem;
  text-align: center;
}
</style>
