import React, { useState } from 'react';
import './NewGoal.css';

const NewGoal = props => {
    let [goalInput, setGoalInput] = useState('');

    const inputChangeHandler = evt => {
        setGoalInput(evt.target.value);
    }

    const addGoalHandler = evt => {
        evt.preventDefault();

        const newGoal = {
            id: Math.random().toString(),
            text: goalInput
        }

        setGoalInput('');

        props.onAddGoal(newGoal);
    };

    return (
        <form className="new-goal" onSubmit={addGoalHandler}>
            <input type="text" value={goalInput} onChange={inputChangeHandler} />
            <button type="submit">Add goal</button>
        </form>
    );
}

export default NewGoal;