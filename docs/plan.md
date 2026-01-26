# Register Modal Update Plan

## Objective
Update the register modal to remove the "tipo de utilizador" field and set the default user type to "normal", while improving the UI to make it look cleaner.

## Current State Analysis
Based on the existing codebase, the register modal is likely implemented in:
- `files/REGlog/regi.php` - Contains the registration form
- `css/my.css` - Contains custom styling
- `js/valida.js` - Contains form validation logic

## Implementation Plan

### Phase 1: Remove "Tipo de Utilizador" Field
1. **Locate the registration form** in `files/REGlog/regi.php`
2. **Remove the user type selection field** from the HTML form
3. **Update the backend processing** to default to "normal" user type
4. **Remove any related validation** for user type selection

### Phase 2: UI Improvements
1. **Review current styling** in `css/my.css` for the registration modal
2. **Implement cleaner design elements**:
   - Improve spacing and padding
   - Enhance form field styling
   - Add better visual hierarchy
   - Improve button styling
   - Add subtle animations/transitions
3. **Implement JavaScript validation with visual feedback**:
   - Replace required field attributes with custom JS validation
   - Add red border/stroke to invalid input fields
   - Display small text below invalid fields with error messages
   - Remove field from invalid state when corrected
4. **Ensure responsive design** works across different screen sizes
5. **Improve accessibility** with proper labels and ARIA attributes

### Phase 3: Backend Updates
1. **Update database insertion** to automatically set user type to "normal"
2. **Remove user type validation** from `js/valida.js`
3. **Test the registration flow** to ensure it works correctly

### Phase 4: Testing and Validation
1. **Test registration functionality** with the new simplified form
2. **Verify user type defaults** to "normal" in the database
3. **Check UI responsiveness** across different devices
4. **Validate form submission** works correctly

## Files to Modify

### Primary Files:
- `files/REGlog/regi.php` - Remove user type field and update form
- `css/my.css` - Add improved styling for cleaner UI
- `js/valida.js` - Remove user type validation

### Secondary Files (if needed):
- Any database connection files that handle user registration
- Any session management files that might reference user types

## Success Criteria
1. ✅ User registration form no longer shows "tipo de utilizador" field
2. ✅ All new users are automatically assigned "normal" user type
3. ✅ Registration modal has improved, cleaner visual design
4. ✅ Form maintains all existing functionality except user type selection
5. ✅ Responsive design works across different screen sizes
6. ✅ Form validation works correctly without user type validation

## Implementation Notes
- Ensure backward compatibility with existing user accounts
- Maintain all existing form validation except for user type
- Keep the registration process simple and intuitive
- Use consistent styling with the rest of the application
- Test thoroughly to ensure no functionality is broken