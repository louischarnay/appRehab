import React from 'react';
import AsyncStorage from "@react-native-async-storage/async-storage";
import { createStackNavigator } from "@react-navigation/stack";
import { NavigationContainer } from '@react-navigation/native';
import Home from './stacks/Home';
import Profile from './stacks/Profile';
import Challenge from './stacks/Challenge';

async function setStorage(key: string, value: string){
    if(typeof value === Object){
        value = JSON.stringify(value)
    }
    try {
        await AsyncStorage.setItem(key, value)
    }catch (error){
    }
}

async function initGlobals(){
    global.amountExercicesStartedMonth = 0
    global.amountExercicesEndedMonth = 0
    let tmp
    try {
        tmp = await AsyncStorage.getItem('amountExercicesStartedMonth')
    }catch (e){}
    global.amountExercicesStartedMonth = Number(tmp)
    try {
        tmp = await AsyncStorage.getItem('amountExercicesEndedMonth')
    }catch (e){}
    global.AmountExercicesEndedMonth = Number(tmp)
    global.AmountExercicesEndedMonth = 0
}

async function initHistorique(){
    let tmp = null
    try {
        tmp = await AsyncStorage.getItem('nbItemsHistorique')
    }catch (e) {}
    if(tmp === null){
        await setStorage('nbItemsHistorique', '0')
    }
}

global.mainColor = '#88bd28';
const getAllDataFromApi = async () => {
    const response = await fetch('https://apprehab.000webhostapp.com/api/api.json' + '?' + new Date());
    const json = await response.json();
    for (var cpt = 0; cpt < json.categories.length; cpt++) {
        try {
            const toString = JSON.stringify(json.categories[cpt]);
            await setStorage('categorie' + cpt, toString)
        } catch (error){}
    }
    for (cpt = 0; cpt < json.themes.length; cpt++) {
        try{
            const toString = JSON.stringify(json.themes[cpt]);
            await setStorage('theme' + cpt, toString);
        } catch(error){}
    }
    for (cpt = 0; cpt < json.exercices.length; cpt++) {
        try{
            const toString = JSON.stringify(json.exercices[cpt]);
            await setStorage('exercice' + cpt, toString);
        } catch(error){}
    }
    for (cpt = 0; cpt < json.items.length; cpt++) {
        try{
            const toString = JSON.stringify(json.items[cpt]);
            await setStorage('item' + cpt, toString);
        } catch(error){}
    }
    try {
        await setStorage('categoriesLength', '' + json.categories.length)
        await setStorage('themesLength', '' + json.themes.length)
        await setStorage('exercicesLength', '' + json.exercices.length)
        await setStorage('itemsLength', '' + json.items.length)
        toString = JSON.stringify(json.categories)
        await setStorage('allCategories', toString)
        toString = JSON.stringify(json.themes)
        await setStorage('allThemes', toString)
        toString = JSON.stringify(json.exercices)
        await setStorage('allExercices', toString)
        toString = JSON.stringify(json.items)
        await setStorage('allItems', toString)
        toString = JSON.stringify(json.mots)
        await setStorage('allMots', toString)
        await setStorage('themesLength')
        toString = JSON.stringify((json.presentation))
        await setStorage('presentation', toString)
    } catch(error){}
};

async function setMonth(){
    let month
    try {
        month = await AsyncStorage.getItem("monthOfUpdate")
    } catch (e) {}
    if(month === null) {
        let date = "" + new Date().getMonth()
        await setStorage("monthOfUpdate", date)
    } else{
        let lastUpdate
        try {
            lastUpdate = await AsyncStorage.getItem("monthOfUpdate")
        }catch (e) { console.log("" + e)}
        if(lastUpdate !== ("" + new Date().getMonth())){
            await setStorage("amountExercicesStartedMonth", "0")
            await setStorage("amountExercicesEndedMonth", "0")
            let date = "" + new Date().getMonth()
            await setStorage("monthOfUpdate", date)
        }
    }
}

const Stack = createStackNavigator();

export default class App extends React.Component {
  render() {
    setMonth()
    initGlobals()
    getAllDataFromApi()
    initHistorique()
    return (
      <NavigationContainer>
        <Stack.Navigator>
          <Stack.Screen name="Home" component={Home} options={{headerShown: false}}/>
          <Stack.Screen name="Profile" component={Profile} options={{headerShown: false}}/>
          <Stack.Screen name="Challenge" component={Challenge} options={{headerShown: false}}/>
        </Stack.Navigator>
      </NavigationContainer>
    );
  };
};