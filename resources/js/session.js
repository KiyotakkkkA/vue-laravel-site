import { reactive } from "vue";

const userSession = () => {
    var totalValue = 0;
    var personalCut = 0;

    var selected = new Map();

    return {
        totalValue,
        personalCut,
        selected,
    };
};

function saveSessionData(key, data) {
    localStorage.setItem(
        key,
        JSON.stringify({ ...data, selected: Array.from(data.selected) })
    );
}

function loadSessionData(key) {
    const data = JSON.parse(localStorage.getItem(key)) ?? null;
    if (data && data.selected) {
        data.selected = new Map(data.selected);
    }
    return data;
}

if (!loadSessionData("session")) {
    saveSessionData("session", userSession());
}

var session = reactive(loadSessionData("session"));

export default { session, saveSessionData };
