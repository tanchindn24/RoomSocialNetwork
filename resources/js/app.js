import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler';
import ProviderApp from "./provider/component/ProviderApp.vue";
import SeekerApp from "./seeker/component/SeekerApp.vue";
// Import the functions you need from the SDKs you need
import firebase from "firebase/compat/app";
import "firebase/compat/firestore";

// Your web app's Firebase configuration
const firebaseConfig = {
    apiKey: "AIzaSyDjNxWtVxllyHkgis5M95sCuHYsKEY92qU",
    authDomain: "laravel-chat-app-firebase.firebaseapp.com",
    databaseURL: "https://laravel-chat-app-firebase-default-rtdb.asia-southeast1.firebasedatabase.app",
    projectId: "laravel-chat-app-firebase",
    storageBucket: "laravel-chat-app-firebase.appspot.com",
    messagingSenderId: "61627028589",
    appId: "1:61627028589:web:cb9ada08bb54825253db64"
};

// Initialize Firebase
try {
    firebase.initializeApp(firebaseConfig);
} catch (error) {
    console.error("Firebase initialization error", error.stack);
}

const db = firebase.firestore();
try {
    window.db = db;
} catch (error) {
    console.error("Error setting Firestore timestamps", error.stack);
}

export {firebase, db};

const appProvider = createApp({});
appProvider.component('provider-app', ProviderApp);
appProvider.mount("#provider_app");

const appSeeker = createApp({});
appSeeker.component('seeker-app', SeekerApp)
appSeeker.mount("#seeker_app");
