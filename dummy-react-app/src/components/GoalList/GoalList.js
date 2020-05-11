import React from "react";

const GoalList = props => {
    return (
        <ul>
            {props.goals.map(goal => <li key={goal.id}>{goal.text}</li>)}
        </ul>
    );
};

export default GoalList;