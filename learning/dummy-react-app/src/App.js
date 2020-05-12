import React, { useState } from 'react';
import './App.css';
import GoalList from './components/GoalList/GoalList';
import NewGoal from './components/NewGoal/NewGoal';

const App = () => {
  const [courseGoals, setCourseGoals] = useState(
    [
      {
        id: '1',
        text: 'Goal 1'
      },
      {
        id: '2',
        text: 'Goal 2'
      },
      {
        id: '3',
        text: 'Goal 3'
      },
      {
        id: '4',
        text: 'Goal 4'
      },
    ]
  );

  const addNewGoalHandler = newGoal => {
    // setCourseGoals(courseGoals.concat(newGoal));

    setCourseGoals(prevCourseGoals => prevCourseGoals.concat(newGoal));
  };

  return <div>
    <NewGoal onAddGoal={addNewGoalHandler} />
    <GoalList goals={courseGoals} />
  </div>;
};

export default App;
