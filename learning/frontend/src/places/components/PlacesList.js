import React from 'react';

import Card from '../../shared/components/UIElements/Card';
import PlaceItem from './PlaceItem';
import './PlacesList.css';

const PlacesList = props => {
    if (!props.items.length)
        return (
            <div className="places-list center">
                <Card>
                    <h2>There are no places</h2>
                    <button>Share Place</button>
                </Card>
            </div>
        );

    return (
        <ul className="places-list">
            {props.items.map(place => <PlaceItem key={place.id} id={place.id} images={place.imageUrl} title={place.title} description={place.description} address={place.address} creatorId={place.creators} coordinates={place.location} />)}
        </ul>
    );
}

export default PlacesList;