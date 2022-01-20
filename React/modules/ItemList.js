import React from 'react';
import { SafeAreaView, View, FlatList, StyleSheet, Text, StatusBar } from 'react-native';

function navigation(params){
  if (params.title == 'Lexique'){
    const DATA = [
      {
        id: '1',
        title: 'ABCD',
        link: 'LessonPage',
      },
    ];
    params.nav.navigate('LexiquePage', {DATA:{DATA}, color:params.color})
  }
  else {
    params.nav.navigate(params.link, {title:params.title, color:params.color})
  }
};

const Item = (item) => (
  <View style={styles.item} backgroundColor={item.color} onStartShouldSetResponder={() => navigation(item)}>
    <Text style={styles.title}>{item.title}</Text>
  </View>
);


const ItemList = (props) => {
  const renderItem = ({ item }) => (
    <Item title={item.title} color={props.color} link={item.link} nav={props.navigation}/>
  );
  return (
    <SafeAreaView style={styles.container}>
      <FlatList

        data={props.DATA}
        renderItem={renderItem}
        keyExtractor={item => item.id}
      />
    </SafeAreaView>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    marginTop: 20,
  },
  item: {
    padding: 20,
    marginVertical: 8,
    marginHorizontal: 16,
    borderRadius: 5,
  },
  title: {
    fontSize: 25,
    color: 'white',
    fontWeight: 'bold',
  },
});

export default ItemList;