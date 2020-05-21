import React from 'react';

import './NewPlace.css';
import { VALIDATOR_REQUIRE } from '../../shared/utils/validators';
import Input from '../../shared/components/FormElements/Input';

const NewPlace = () => {
  return (
    <form className="place-form" onSubmit={(event) => event.preventDefault()}>
      <Input
        element="input"
        type="text"
        label="Title"
        validators={[VALIDATOR_REQUIRE()]}
        errorText="Please enter a valid title"
      />
    </form>
  )
};

export default NewPlace;