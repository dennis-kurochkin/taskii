import React from 'react';
import './NewGoal.css';

const NewGoal = props => {
    const addGoalHandler = evt => {
        evt.preventDefault();

        const newGoal = {
            id: Math.random().toString(),
            text: 'Dummy Text'
        }

        props.onAddGoal(newGoal);
    };

    return (
        <form className="new-goal" onSubmit={addGoalHandler}>
            <input type="text" />
            <button type="submit">Add goal</button>
        </form>
    );
}

export default NewGoal;