import Router from 'vue-router';
import home from "./components/HomeComponent.vue";
import countdown from "./components/CountDownComponent.vue";
import question from "./components/QuestionComponent.vue";
import result from "./components/ResultComponent.vue";


export default new Router({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: home,
        },
        {
            path: "/countdown",
            name: "countdown",
            component: countdown,
            props: true
        },
        {
            path: "/question",
            name: "question",
            component: question,
            props: true
        },
        {
            path: "/result",
            name: "result",
            component: result,
            props: true
        }
    ]
});