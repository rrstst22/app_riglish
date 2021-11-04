import Router from 'vue-router';
import home from "./components/HomeComponent.vue";
import countdown from "./components/CountDownComponent.vue";
import question from "./components/QuestionComponent.vue";
import result from "./components/ResultComponent.vue";


export default new Router({
    mode: "history",
    routes: [
        {
            path: "/riglish/public/",
            name: "home",
            component: home,
        },
        {
            path: "/riglish/public/countdown",
            name: "countdown",
            component: countdown,
            props: true
        },
        {
            path: "/riglish/public/question",
            name: "question",
            component: question,
            props: true
        },
        {
            path: "/riglish/public/result",
            name: "result",
            component: result,
            props: true
        }
    ]
});