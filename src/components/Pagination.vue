<template>
    <ul>
        <li class="isactive"><a href="#take-a-break">Take a break</a></li>
        <li><a href="#post-event">post event</a></li>
    </ul>
</template>

<script>
export default {
    name: 'Pagination',
    props: {
        current: String
    }
}
</script>

<style scoped>
    ul {
        display: flex;
        list-style: none;
        margin: 0 0 0 4px;
        padding: 0;
    }
    li {
        margin: 0;
        padding: 6px 12px;
        border: 1px solid #007cba;
        border-bottom: none;
    }

    li a {
        text-decoration: none;
        color: #007cba;
        font-size: .8rem;
    }

    li.isactive {
        background: #f6f6f6;
        box-shadow: 4px 0 6px #b4b4b4;
    }
</style>