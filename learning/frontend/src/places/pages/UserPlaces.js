import React from 'react';
import PlacesList from '../components/PlacesList';

const UserPlaces = () => {
    const items = [
        {
            id: '1',
            title: 'Kremlin',
            description: 'Immense, fortified compound of churches & palaces, with museums of Russian state regalia & art.',
            address: 'Moscow, 103073',
            creators: 'u1',
            location: {
                lat: 55.7520233,
                lng: 37.6174994
            },
            imageUrl: 'https://s4.drugiegoroda.ru/4/366/36604-Moscow_Kremlin_from_Kamenny_bridge-940x310.jpg',
        },
        {
            id: '2',
            title: 'Place 2',
            description: 'Description',
            address: 'London',
            creators: '2',
            location: '1111',
            imageUrl: 'https://picsum.photos/1200/1300',
        }
    ]

    return (
        <PlacesList items={items} />
    );
}

export default UserPlaces;